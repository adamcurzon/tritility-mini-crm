<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Employee::factory()->create([
            'first_name' => 'Adam',
            'last_name' => 'Curzon',
            'company_id' => 1,
            'email' => 'adam@curzon.org',
            'phone' => '01913675000'
        ]);

        \App\Models\Employee::factory()
            ->count(100)
            ->create();
    }
}
