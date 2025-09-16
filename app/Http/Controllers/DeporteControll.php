<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use App\Models\Entrenador;
use App\Models\User;
use Illuminate\Http\Request;

class DeporteControll extends Controller
{
    /**
     * Ver la lista completa de Deportes
     */
    public function index()
    {
        $deportes = Deporte::all();
        return view('deportes')->with('deportes', $deportes);
    }

    /**
     * cargar la vista para crear un nuevo Deporte
     */
    public function create()
    {
        $deportes = new Deporte();
        $entrenadores = Entrenador::all();
        $users = User::all();
        return view("nuevoDeporte")->with(['deportes' => $deportes, 'entrenadores' => $entrenadores,'users'=>$users]);
    }

    /**
     * Guardar el nuevo Deporte
     */
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
        if($request->has('id_user')){
            $deporte->usuarios()->sync($request->id_user);// sincronizacion tabla pivote
        }
        //Executamos
        $deporte->save();
        //Rediriximos ao usuario a táboa de deportes
        return redirect()->to('deportes')->with('success', 'A deporte foir creada correctamente');
    }

    /**
     * cargar la vista para modificar Deporte
     */
    public function edit($id)
    {
        $deporte = Deporte::find($id);
        $entrenadores = Entrenador::all();
        $users = User::all();
        return view("deporte")->with(['deporte' => $deporte, 'entrenadores' => $entrenadores,'users'=>$users]);
    }

    /**
     * modificar Deporte
     */
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

        //ejecutamos la sentencia
        $deporte->save();
        //devolvemos a páxina de deportes
        return redirect()->to('deportes')->with('success', 'O deporte foi actualizada correctamente');
    }

    /**
     * eliminar Deporte según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $Deporte = Deporte::findOrFail($id);
        //Executamos 
        $Deporte->delete();
        //Recargamos a páxina
        return redirect()->to('deportes')->with('success', 'O deporte foi eliminada correctamente');
    }

}
