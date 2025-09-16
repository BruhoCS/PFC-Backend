<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;

class EntrenadorApiController extends Controller
{
    //INDEX
    public function index()
    {
        $entrenadores = Entrenador::all();
        return response()->json($entrenadores,200);
    }

    //Funcion para la API Store
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            "nombre" => "required|string",
            "apellido" => "required|string|max:20",
            "email" => "required|string|unique:entrenador|max:50",
            "telefono" => "required|string",
            "direccion" => "nullable|string|max:100" 
        ]);

        //Obxeto de entrenador
        $entrenador = Entrenador::create($request->all());
        //Rediriximos ao usuario a táboa de entrenadores
        return response()->json($entrenador,200);
    }

    //Funcion para la API Update
    public function update(Request $request,$id)
    {
        //Buscamos al entrenador
        $entrenador = Entrenador::find($id);
        //Validamos o valor introducido
        $request->validate([
            "nombre" => "required|string",
            "apellido" => "required|string|max:20",
            "email" => "required|string|unique:entrenador|max:50",
            "telefono" => "required|string",
            "direccion" => "nullable|string|max:100" 
        ]);

        //Actualizamos el entrenador
        $entrenador->update($request->all());
        //Enviamos la informacion en formato json
        return response()->json($entrenador,200);
    }

    //Funcion para la API Destroy
    public function destroy($id)
    {
        //Atopamos o id
        $entrenador = Entrenador::find($id);
        //Si no existe indicamo
        if(!$entrenador){
            return response()->json(['error'=>"No se encontró el entrenador"],404);
        }
        //Executamos 
        $entrenador->delete();
        //Recargamos a páxina
        return response()->json(['message'=>'Entrenador borrado exitosamente'],200);
    }
}
