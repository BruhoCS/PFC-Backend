<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanPremiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('plan_premium')->delete();
        DB::statement('ALTER TABLE deporte AUTO_INCREMENT = 1');
        // Datos predefinidos
        DB::table('plan_premium')->insert(["id_plan"=>"2","descuento" => "20%", 'ventaja_extra' => 'Deportes gratis']);
       
    }
}
