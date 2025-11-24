<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteUserApiController extends Controller
{
    // POST /api/deportes/{deporte}/apuntarse
    public function apuntarse(Request $request, Deporte $deporte)
    {
        $user = $request->user();

        // Añadimos el registro a la tabla pivote sin borrar otros
        $user->deportes()->syncWithoutDetaching([$deporte->id]);

        return response()->json(['deportes' => $user->deportes()->get()], 201);
    }

    // DELETE /api/deportes/{deporte}/borrarse
    public function borrarse(Request $request, Deporte $deporte)
    {
        $user = $request->user();
        $user->deportes()->detach($deporte->id);

        return response()->json([
            'deportes' => $user->deportes()->get(),
        ]);
    }

    // GET /api/perfil/deportes
    public function misDeportes(Request $request)
    {
        return response()->json($request->user()->deportes()->get());
    }

}
