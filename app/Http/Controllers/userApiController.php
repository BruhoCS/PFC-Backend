<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class userApiController extends Controller
{
    public function apuntarsePlan(Request $request, Plan $plan)
    {
        // Obtengo al usuario autenticado usando el token Bearer gestionado por Sanctum.
        $user = $request->user();

        // Asigno al usuario el plan recibido en la URL.
        $user->id_plan = $plan->id;

        // Guardo los cambios en la base de datos, actualizando el id_plan del usuario.
        $user->save();

        // Devuelvo una respuesta JSON con un mensaje informativo
        // y el usuario actualizado, confirmando que la operación fue exitosa.
        return response()->json([
            'message' => 'Plan asignado correctamente',
            'user' => $user
        ], 200);
    }
}
