<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use App\Models\User;
use Illuminate\Http\Request;

class DeporteApiController extends Controller
{
    //INDEX
    public function index()
    {
        $deportes = Deporte::all();
        return response()->json($deportes, 200);
    }

    //Funcion store para la API
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            "nombre" => "required|string|max:50",
            "precio" => "required|string|min:0",
            "dia" => "required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo",
            "descripcion" => "nullable|string|max:100",
            "nivel" => "nullable|string|max:20",
            "duracion" => "required|string",
            "id_entrenador" => "required",
            "id_user" => "nullable|array",
            "id_user.*" => "exists:users,id"
        ]);

        // Busca el deporte o créalo si no existe
        $deporte = Deporte::firstOrCreate(
            ["nombre" => $request->nombre], // Busca por nombre
            $request->only(["precio", "dia", "descripcion", "nivel", "duracion", "id_entrenador"])
        );

        // Si el deporte tiene usuarios
        if ($request->has('id_user')) {
            $deporte->usuarios()->sync($request->id_user); // sincronizacion tabla pivote
        }
        // Devolvemos el deporte con la relación de usuarios
        return response()->json(["deporte" => $deporte->load("usuarios")], 201);
    }


    //Funcion store para la API
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            "nombre" => "required|string|max:50",
            "precio" => "required|string|min:0",
            "dia" => "required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo",
            "descripcion" => "nullable|string|max:100",
            "nivel" => "nullable|string|max:20",
            "duracion" => "required|string",
            "id_entrenador" => "required",
            "id_user" => "nullable|array",
            "id_user.*" => "exists:users,id"
        ]);
    
        // Busca el deporte o créalo si no existe
        $deporte = Deporte::updateOrCreate(
            ["nombre" => $request->nombre], // Busca por nombre
            $request->only(["precio", "dia", "descripcion", "nivel", "duracion", "id_entrenador"])
        );
        // Si el deporte tiene usuarios
        if($request->has('id_user')){
            $deporte->usuarios()->sync($request->id_user);// sincronizacion tabla pivote
        }
        //Lo devolvemos como JSON
        // Devolvemos el deporte con la relación de usuarios
        return response()->json([
            "deporte" => $deporte->load("usuarios"),
            "message" => "Deporte actualizado correctamente"
        ], 201);
    }

    //Funcion destroy para la API
    public function destroy($id)
    {
        //Buscamos el pokemon
        $deporte = Deporte::find($id);

        //Si no existe indicamos al usaurio
        if (!$deporte) {
            return response()->json(['error' => "No se encontró el deporte"], 404);
        }

        //Si existe borramos el pokemon
        $deporte->delete();

        return response()->json(['message' => 'Deporte borrado exitosamente'], 200);
    }
}
