<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BoostrapSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => "teste",
            'email' => 'Xu4e0@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
