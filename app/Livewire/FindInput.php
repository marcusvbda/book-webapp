<?php

namespace App\Livewire;

use App\Enums\ServiceTypeEnum;
use App\Helper;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\Attributes\On;

class FindInput extends Component
{
    public $popularServiceList = [];
    public $results = [];

    public function mount(): void
    {
        $this->popularServiceList = $this->makePopularServiceList();
    }

    public function makePopularServiceList(): array
    {
        $services = ServiceTypeEnum::cases();
        return array_slice($services, 0, 3);
    }

    #[On('on-selected-service')]
    public function selectService(string $serviceName): void
    {
        $this->redirect(Helper::routeLocaled('search', ["filter" => $serviceName]));
    }

    public function filterResults($filter)
    {
        $controller = App::make(ServicesController::class);
        $result = $controller->getFilterServices($filter);
        $query = $result['query'];

        $response = [];

        if ($query) {
            $paginated = $query->paginate(10);
            if ($paginated->total() > 0) {
                $paginated->getCollection()->each(fn($row) => $row->append(['logo', 'inlineAddress', 'pageUrl']));
                $response[__('Companies or Service Providers')] = $paginated;
            }
        }

        $services = $result['services'];
        if (count($services)) {
            $response[__('Services')] = array_map(fn($service) => __($service->value), $services);
        }


        return $response;
    }

    public function render()
    {
        return view('livewire.find-input');
    }
}
