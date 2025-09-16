<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrenadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('entrenador')->delete();
        DB::statement('ALTER TABLE entrenador AUTO_INCREMENT = 1');

        // Datos predefinidos
        DB::table('entrenador')->insert(["email" => "cristian@gmail.com", 'nombre' => 'Cristian', 'apellido' => 'Diaz', 'direccion' => 'Fene','telefono'=>'6924512']);
        DB::table('entrenador')->insert(["email" => "pablo@gmail.com", 'nombre' => 'Pablo', 'apellido' => 'Seijo', 'direccion' => 'O Val','telefono'=>'6927812']);
        DB::table('entrenador')->insert(["email" => "iria@gmail.com", 'nombre' => 'Iria', 'apellido' => 'Diaz', 'direccion' => 'Monforte','telefono'=>'6874512']);
        DB::table('entrenador')->insert(["email" => "isma@gmail.com", 'nombre' => 'Ismael', 'apellido' => 'Sande', 'direccion' => 'Ferrol','telefono'=>'6929912']);
        DB::table('entrenador')->insert(["email" => "ale@gmail.com", 'nombre' => 'Alejandro', 'apellido' => 'Lopez', 'direccion' => 'Pontedeume','telefono'=>'6929912']);
    
    }
}
