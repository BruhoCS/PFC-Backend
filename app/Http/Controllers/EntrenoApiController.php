<?php

namespace App\Http\Controllers;

use App\Models\Entreno;
use App\Models\User;
use Illuminate\Http\Request;

class EntrenoApiController extends Controller
{
    /**
     * Ver la lista completa de entrenadores
     */
    public function index()
    {
        $entrenos = Entreno::all();
        return response()->json($entrenos, 200);
    }

    /**
     * Ver datos del los ejercicios del usuario que esta en la sesión
     */
    public function getEntreno(Request $request)
    {
        $userId = $request->user()->id; // usuario autenticado
        return Entreno::where('id_user', $userId)->get();
    }
    /**
     * Guardar el nuevo entreno
     */
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $data=$request->validate([
            "dia" => "required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo",
            "grupo_muscular" => "required|in:Tren Superior,Tren Inferior,Core",
            "ejercicio" => "required|string",
            "repeticiones" => "required|string|min:1|max:20",
            "tipo" => "nullable|in:Fuerza,Resistencia,Velocidad,Potencia",
            "duracion" => "required|string",
            "descanso" => "nullable|string"
        ]);

        $data['id_user'] = $request->user()->id;

        // 3) Crear con datos validados
        $entreno = Entreno::create($data);

        return response()->json($entreno, 201);
        /*
        //Obxeto de entreno
        $entreno = Entreno::create($request->all());
        //Rediriximos ao usuario a táboa de entrenos
        return response()->json($entreno, 201);*/
    }

    /**
     * modificar entreno
     */
    public function update(Request $request, $id)
    {
        // Buscamos el entreno
        $entreno = Entreno::find($id);
        //Validanse os campos
        $request->validate([
            "dia" => "required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo",
            "grupo_muscular" => "required|in:Tren Superior,Tren Inferior,Core",
            "ejercicio" => "required|string",
            "repeticiones" => "required|string|min:1|max:20",
            "tipo" => "nullable|in:Fuerza,Resistencia,Velocidad,Potencia",
            "duracion" => "required|string",
            "descanso" => "nullable|string",
            "id_user" => "required|string"
        ]);
        // Actualizamos el entreno
        $entreno->update($request->all());
        //devolvemos un json de entreno
        return response()->json($entreno, 201);
    }

    /**
     * eliminar entreno según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $entreno = Entreno::find($id);
        //Si no existe indicamos al usaurio
        if (!$entreno) {
            return response()->json(['error' => "No se encontró el entreno"], 404);
        }
        //Si existe borramos el entreno
        $entreno->delete();
        return response()->json(['message' => 'entreno borrado exitosamente'], 200);
    }
}
