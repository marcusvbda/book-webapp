<?php

namespace App\Livewire;

use App\Enums\ServiceType;
use Livewire\Component;
use Livewire\Attributes\On;
use App;

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
        $services = ServiceType::cases();
        return array_slice($services, 0, 3);
    }

    public function updatedFilter(): void
    {
        // dd($this->filter);
    }

    #[On('on-selected-service')]
    public function selectService(string $serviceName): void
    {
        $this->redirect(route('search', ["filter" => $serviceName]));
    }

    public function filterResults($filter)
    {
        $results = [];
        $services = array_filter(ServiceType::cases(), function ($service) use ($filter) {
            return str_contains(strtolower(__($service->value)), strtolower($filter)) !== false;
        });

        if (count($services)) {
            $results[__('Services')] = array_map(fn($service) => __($service->value), $services);
        }

        return $results;
    }

    public function render()
    {
        return view('livewire.find-input');
    }
}
