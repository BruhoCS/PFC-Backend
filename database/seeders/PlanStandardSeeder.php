<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanStandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('plan_standard')->delete();
        DB::statement('ALTER TABLE plan_standard AUTO_INCREMENT = 1');
        // Datos predefinidos
        DB::table('plan_standard')->insert(["id_plan"=>"1","costes_adicionales" => "Sillones de masaje", 'seguimiento_basico' => 'mensual']);
        
    }
}
