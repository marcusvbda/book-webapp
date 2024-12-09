<?php

namespace App\Http\Controllers;

use App\Enums\ServiceTypeEnum;
use App\Models\Company;

class ServicesController extends Controller
{
    public function getFilterQuery(string $filter)
    {
        $indexType = ServiceTypeEnum::fromTranslatedValue($filter);
        // $query = Company::whereHas('serviceTypes', function ($query) use ($filter) {
        //     $query->where('service_type', $filter);
        // });
    }

    public function resultPage(string $filter)
    {
        $this->getFilterQuery($filter);
        return "result page";
    }
}
