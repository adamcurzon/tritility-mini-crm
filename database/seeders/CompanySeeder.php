<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Company::factory()->create([
            'name' => 'Tritility',
            'email' => 'info@tritility.com',
            'logo' => 'default.png',
            'website' => 'https://www.tritility.com/',
        ]);

        \App\Models\Company::factory()
            ->count(50)
            ->create();
    }
}
