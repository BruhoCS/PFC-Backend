<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('plan')->delete();
        DB::statement('ALTER TABLE plan AUTO_INCREMENT = 1');
        // Datos predefinidos
        DB::table('plan')->insert([
            ['id' => 1, 'nombre' => 'Dain', 'precio' => 25],
            ['id' => 2, 'nombre' => 'Fenrir', 'precio' => 35],
        ]);
    }
}
