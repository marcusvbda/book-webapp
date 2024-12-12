<?php

namespace App\Livewire;

use App\Enums\ServiceTypeEnum;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class FindInput extends Component
{
    public $popularServiceList = [];
    public $results = [];
    public $perpage = 5;

    public function mount(): void
    {
        $this->popularServiceList = $this->makePopularServiceList();
    }

    public function makePopularServiceList(): array
    {
        $services = ServiceTypeEnum::cases();
        return array_slice($services, 0, 3);
    }

    public function filterResults($filter)
    {
        $controller = App::make(ServicesController::class);
        $result = $controller->getFilterServices($filter);
        $query = $result['query'];

        $response = [];

        $services = $result['services'];
        if (count($services)) {
            $response[__('Services')] = array_map(fn($service) => __($service->value), $services);
        }

        if ($query) {
            $paginated = $query->paginate($this->perpage);
            if ($paginated->total() > 0) {
                $paginated->getCollection()->each(fn($row) => $row->append(['logo', 'inlineAddress', 'pageUrl']));
                $response[__('Companies or Service Providers')] = $paginated;
            }
        }

        return $response;
    }

    public function loadMore($params)
    {
        $controller = App::make(ServicesController::class);
        $result = $controller->getFilterServices($params["filter"], false);
        $query = $result['query'];
        $paginated = $query->paginate($this->perpage, ['*'], 'page', $params["page"]);
        return [
            'key' => __('Companies or Service Providers'),
            'current_page' => $paginated->currentPage(),
            'result' =>  $paginated->getCollection()->each(fn($row) => $row->append(['logo', 'inlineAddress', 'pageUrl']))
        ];
    }

    public function render()
    {
        return view('livewire.find-input');
    }
}
