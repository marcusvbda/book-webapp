<?php

namespace Database\Seeders;

use App\Enums\ServiceTypeEnum;
use App\Models\Company;
use Illuminate\Database\Seeder;

class BoostrapSeeder extends Seeder
{
    public function run(): void
    {
        Company::query()->delete();

        $company = Company::create([
            'name' => 'Barbearia do joão',
        ]);

        $company->serviceTypes()->create([
            'service_type' => ServiceTypeEnum::BarberShop->name
        ]);

        $company->files()->create([
            'description' => "logo",
            'default' => true,
            'url' => "https://s3.amazonaws.com/www-inside-design/uploads/2019/05/woolmarkimagelogo-1024x576.png"
        ]);

        $company->addresses()->create([
            'description' => "Unidade taboão",
            'default' => true,
            'country' => 'BR',
            'zipcode' => '06763060',
            'city' => 'Taboão da serra',
            'state' => 'SP',
            'street' => 'Francisco andugar espinosa',
            'neighborhood' => 'Chácara agrindus',
            'number' => '18',
            'complement' => 'apt 27a'
        ]);

        $company->addresses()->create([
            'description' => "Unidade marilia",
            'default' => false,
            'country' => 'BR',
            'zipcode' => '17506030',
            'street' => '24 de dezembro',
            'city' => 'Marilia',
            'state' => 'SP',
            'neighborhood' => 'Somenzari',
            'number' => '1916'
        ]);
    }
}
