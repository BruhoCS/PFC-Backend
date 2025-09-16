<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\Entreno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntrenadorControll extends Controller
{
    /**
     * Ver la lista completa de entrenadores
     */
    public function index()
    {
        $entrenadores = Entrenador::all();
        return view('entrenadores')->with('entrenadores', $entrenadores);
    }

    /**
     * cargar la vista para crear un nuevo entrenador
     */
    public function create()
    {
        $entrenador = new Entrenador();
        return view("nuevoEntrenador")->with('entrenador', $entrenador);
    }

    /*Funciones para la paginación y apifetch */
    public function paginarEntrenadores(Request $request)
    {
        $entrenadores = DB::table('entrenador')->orderBy('id', 'ASC')->paginate(3);
        if ($request->ajax()) {
            return view('cargarEntrenadores', compact('entrenadores'));
        }

        return view('paginarEntrenadores', compact('entrenadores'));
    }

    public function getEntrenador($id)
    {
        $entrenador = Entrenador::find($id);

        return view('fichaEntrenador', compact('entrenador'));
    }

    public function apifetchEntrenadores(Request $request)
    {
        $nombres = Entrenador::where("nombre", "LIKE", $request->texto . "%")->take(10)->get();

        return view('entrenadoresapifetch', compact('nombres'));
    }

    /**
     * Guardar el nuevo entrenador
     */
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
        $entrenador = new Entrenador();
        //Gardamos o valor
        $entrenador->nombre = $request->input('nombre');
        $entrenador->apellido = $request->input('apellido');
        $entrenador->email = $request->input('email');
        $entrenador->telefono = $request->input('telefono');
        $entrenador->direccion = $request->input('direccion');
        //Executamos
        $entrenador->save();
        //Rediriximos ao usuario a táboa de entrenadores
        return redirect()->to('entrenadores')->with('success', 'A entrenador foir creada correctamente');
    }

    /**
     * cargar la vista para modificar entrenador
     */
    public function edit($id)
    {
        $entrenador = Entrenador::find($id);
        return view('entrenador')->with('entrenador', $entrenador);
    }

    /**
     * modificar entrenador
     */
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            "nombre" => "required|string",
            "apellido" => "required|string|max:20",
            "email" => "required|string|unique:entrenador|max:50",
            "telefono" => "required|string",
            "direccion" => "nullable|string|max:100"
        ]);
        $entrenador = Entrenador::find($id);
        //Gardamos o valor
        $entrenador->nombre = $request->input('nombre');
        $entrenador->apellido = $request->input('apellido');
        $entrenador->email = $request->input('email');
        $entrenador->telefono = $request->input('telefono');
        $entrenador->direccion = $request->input('direccion');
        //Executamos a sentencia
        $entrenador->save();
        //devolvemos a páxina de entrenadores
        return redirect()->to('entrenadores')->with('success', 'O entrenador foi actualizada correctamente');
    }

    /**
     * eliminar entrenador según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $entrenador = Entrenador::findOrFail($id);
        //Executamos 
        $entrenador->delete();
        //Recargamos a páxina
        return redirect()->to('entrenadores')->with('success', 'O entrenador foi eliminada correctamente');
    }
}
