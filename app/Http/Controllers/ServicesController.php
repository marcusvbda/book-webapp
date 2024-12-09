<?php

namespace App\Http\Controllers;

use App\Enums\ServiceTypeEnum;
use App\Models\Company;

class ServicesController extends Controller
{
    public function getFilterServices(string $filter)
    {
        $types = array_values(array_filter(ServiceTypeEnum::cases(), fn(mixed $serviceType) => strpos(strtolower(__($serviceType->value)), strtolower($filter)) !== false)) ?? [];
        $query = Company::when(count($types), function ($q) use ($types) {
            $mappedTypes = array_map(fn(mixed $serviceType) => $serviceType->name, $types);
            $q->whereHas('serviceTypes', fn($q) => $q->whereIn('service_type', $mappedTypes));
        })->orWhere(function ($q) use ($filter) {
            $q->where('name', 'like', '%' . $filter . '%');
        });

        return ["services" => $types, "query" => $query];
    }

    public function resultPage(string $filter)
    {
        $result = $this->getFilterServices($filter);
        dd($result);
        return "result page";
    }
}
