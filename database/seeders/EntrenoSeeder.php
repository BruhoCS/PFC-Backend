<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('entreno')->delete();
        DB::statement('ALTER TABLE entreno AUTO_INCREMENT = 1');

        // Datos predefinidos
        DB::table('entreno')->insert(["dia" => "Lunes", 'grupo_muscular' => 'Tren Superior', 'ejercicio' => 'Press Banca', 'repeticiones' => '8','tipo'=>'Fuerza','duracion'=>'1h','descanso'=>'2min','id_user'=>'1']);
        DB::table('entreno')->insert(["dia" => "Lunes", 'grupo_muscular' => 'Tren Superior', 'ejercicio' => 'Press Inclinado', 'repeticiones' => '8','tipo'=>'Fuerza','duracion'=>'1h','descanso'=>'2min','id_user'=>'1']);
        DB::table('entreno')->insert(["dia" => "Lunes", 'grupo_muscular' => 'Tren Superior', 'ejercicio' => 'Aperturas', 'repeticiones' => '8','tipo'=>'Fuerza','duracion'=>'1h','descanso'=>'2min','id_user'=>'1']);
        
        DB::table('entreno')->insert(["dia" => "Martes", 'grupo_muscular' => 'Tren Inferior', 'ejercicio' => 'Sentadilla', 'repeticiones' => '8','tipo'=>'Resistencia','duracion'=>'1h','descanso'=>'2min','id_user'=>'2']);
        DB::table('entreno')->insert(["dia" => "Martes", 'grupo_muscular' => 'Tren Inferior', 'ejercicio' => 'Abdutores', 'repeticiones' => '8','tipo'=>'Resistencia','duracion'=>'1h','descanso'=>'2min','id_user'=>'2']);
        DB::table('entreno')->insert(["dia" => "Martes", 'grupo_muscular' => 'Tren Inferior', 'ejercicio' => 'Femorales', 'repeticiones' => '8','tipo'=>'Resistencia','duracion'=>'1h','descanso'=>'2min','id_user'=>'2']);
        
        DB::table('entreno')->insert(["dia" => "Martes", 'grupo_muscular' => 'Core', 'ejercicio' => 'Planchas', 'repeticiones' => '3','tipo'=>'Resistencia','duracion'=>'1h','descanso'=>'2min','id_user'=>'3']);
        DB::table('entreno')->insert(["dia" => "Martes", 'grupo_muscular' => 'Core', 'ejercicio' => 'Laterales', 'repeticiones' => '3','tipo'=>'Resistencia','duracion'=>'1h','descanso'=>'2min','id_user'=>'3']);

    }
}
