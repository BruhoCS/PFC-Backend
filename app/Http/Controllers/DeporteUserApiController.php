<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteUserApiController extends Controller
{
    // Función para que el usuario se apunte a algún deporte
    public function apuntarse(Request $request, Deporte $deporte)
    {
        $user = $request->user();

        // Añadimos el registro a la tabla pivote sin borrar otros
        $user->deportes()->syncWithoutDetaching([$deporte->id]);

        return response()->json($user->deportes()->get(), 200);

    }

    // Función para borrarse de algún deporte
    public function borrarse(Request $request, Deporte $deporte)
    {
        $user = $request->user();
        $user->deportes()->detach($deporte->id);

        return response()->json($user->deportes()->get(), 200);


    }

    // Función para que cada usuario vea sus deportes
    public function misDeportes(Request $request)
    {
        // $request->user() es el usuario autenticado por Sanctum
        $user = $request->user();

        // Devuelvo todos los deportes de la relación N:M
        return response()->json($user->deportes()->get(), 200);
    }
}
