<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Plan;
use App\Models\PlanPremium;
use App\Models\PlanStandard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PlanSeeder::class,
            PlanPremiumSeeder::class,
            PlanStandardSeeder::class,
            UserSeeder::class,
            EntrenoSeeder::class,
            EntrenadorSeeder::class,
            DeporteSeeder::class,

        ]);
    }
}
