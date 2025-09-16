<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('deporte')->delete();
        DB::statement('ALTER TABLE deporte AUTO_INCREMENT = 1');

        // Datos predefinidos
        DB::table('deporte')->insert(["id_entrenador"=>"1","nombre" => "Boxeo", 'precio' => '25', 'dia' => 'Lunes', 'descripcion' => 'Deporte de contacto','nivel'=>'Intermedio','duracion'=>'60']);
        DB::table('deporte')->insert(["id_entrenador"=>"2","nombre" => "MMA", 'precio' => '30', 'dia' => 'Miércoles', 'descripcion' => 'Deporte de contacto','nivel'=>'Experto','duracion'=>'70']);
        DB::table('deporte')->insert(["id_entrenador"=>"1","nombre" => "Jiu-jitsu", 'precio' => '25', 'dia' => 'Jueves', 'descripcion' => 'Deporte de contacto','nivel'=>'Novato','duracion'=>'60']);
        DB::table('deporte')->insert(["id_entrenador"=>"3","nombre" => "Powerlifting", 'precio' => '40', 'dia' => 'Viernes', 'descripcion' => 'Deporte de fuerza y empuje','nivel'=>'Intermedio','duracion'=>'120']);
        
        // Tambien en la tabla pivote
        DB::table('deporte_users')->insert(['user_id' => '1', 'deporte_id' => 3]);
        DB::table('deporte_users')->insert(['user_id' => '2', 'deporte_id' => 1]);
        DB::table('deporte_users')->insert(['user_id' => '1', 'deporte_id' => 2]);
        DB::table('deporte_users')->insert(['user_id' => '3', 'deporte_id' => 4]);
    }
}
