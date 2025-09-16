<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Borramos las incidencias anteriores
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');

        // Datos predefinidos tablas de usuarios y perfil
        DB::table('users')->insert(["id_plan"=>"1","name" => "Ana", 'email' => 'ana@gmail.com', 'password' =>Hash::make("12345678"), 'rol' => 'admin']);
        DB::table('perfil')->insert(["id_user"=>"1","apellido" => "Prado", 'telefono' => '623475123', 'direccion' => 'Ferrol', 'hobby' => 'deporte']);

        DB::table('users')->insert(["id_plan"=>"2","name" => "Pepe", 'email' => 'pepe@gmail.com', 'password' => Hash::make("12345678"), 'rol' => 'user']);
        DB::table('perfil')->insert(["id_user"=>"2","apellido" => "Roca", 'telefono' => '623489123', 'direccion' => 'Naron', 'hobby' => 'boxeo']);

        DB::table('users')->insert(["id_plan"=>"2","name" => "Luca", 'email' => 'luca@gmail.com', 'password' => Hash::make("12345678"), 'rol' => 'admin']);
        DB::table('perfil')->insert(["id_user"=>"3","apellido" => "Rodriguez", 'telefono' => '698575123', 'direccion' => 'Ferrol', 'hobby' => 'mma']);

        DB::table('users')->insert(["id_plan"=>"1","name" => "Juan", 'email' => 'juan@gmail.com', 'password' => Hash::make("12345678"), 'rol' => 'user']);
        DB::table('perfil')->insert(["id_user"=>"4","apellido" => "Suarez", 'telefono'=>'6228509123','direccion' => 'Valdoviño','hobby'=>'surf']);

        DB::table('users')->insert(["id_plan"=>"2","name" => "Rosa", 'email' => 'rosa@gmail.com', 'password' => Hash::make("12345678"), 'rol' => 'admin']);
        DB::table('perfil')->insert(["id_user"=>"5","apellido" => "Villar", 'telefono'=>'623471423','direccion' => 'Ferrol','hobby'=>'ciclismo']);
    }
}
