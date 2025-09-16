<?php

namespace App\Http\Controllers;

use App\Models\Entreno;
use App\Models\User;
use Illuminate\Http\Request;

class EntrenoControll extends Controller
{
    /**
     * Ver la lista completa de entrenos
     */
    public function index()
    {
        if (auth()->user()->rol === 'admin') {
            $entrenos = Entreno::all();
        } else {
            $entrenos = Entreno::where('id_user', auth()->id())->get();
        }
        return view('entrenos')->with('entrenos', $entrenos);
    }

    /**
     * cargar la vista para crear un nuevo entreno
     */
    public function create()
    {
        $entrenos = Entreno::all();
        $users = User::all();
        return view("nuevoEntreno")->with(['entrenos'=> $entrenos,'users'=>$users]);
    }

    /**
     * Guardar el nuevo entreno
     */
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            "dia" => "required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo",
            "grupo_muscular" => "required|in:Tren Superior,Tren Inferior,Core",
            "ejercicio" => "required|string",
            "repeticiones" => "required|string|min:1|max:20",
            "tipo" => "nullable|in:Fuerza,Resistencia,Velocidad,Potencia",
            "duracion" => "required|string",
            "descanso" => "nullable|string"
        ]);

        //Obxeto de entreno
        $entreno = new Entreno();
        //Gardamos o valor
        $entreno->id_user = $request->input('id_user');
        $entreno->dia = $request->input('dia');
        $entreno->grupo_muscular = $request->input('grupo_muscular');
        $entreno->ejercicio = $request->input('ejercicio');
        $entreno->repeticiones = $request->input('repeticiones');
        $entreno->tipo = $request->input('tipo');
        $entreno->duracion = $request->input('duracion');
        $entreno->descanso = $request->input('descanso');
        //Executamos
        $entreno->save();
        //Rediriximos ao usuario a táboa de entrenos
        return redirect()->to('entrenos')->with('success', 'A entreno foir creada correctamente');
    }

    /**
     * cargar la vista para modificar entreno
     */
    public function edit($id)
    {
        $entreno = Entreno::find($id);
        $usuarios = User::all();
        return view('entreno')->with(['entreno'=>$entreno,'usuarios'=>$usuarios]);
    }

    /**
     * modificar entreno
     */
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            "dia" => "required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo",
            "grupo_muscular" => "required|in:Tren Superior,Tren Inferior,Core",
            "ejercicio" => "required|string",
            "repeticiones" => "required|string|min:1|max:20",
            "tipo" => "nullable|in:Fuerza,Resistencia,Velocidad,Potencia",
            "duracion" => "required|string",
            "descanso" => "nullable|string",
            "id_user"=>"required|string"
        ]);
        $entreno = Entreno::find($id);
        //Gardamos o valor
        $entreno->dia = $request->input('dia');
        $entreno->grupo_muscular = $request->input('grupo_muscular');
        $entreno->ejercicio = $request->input('ejercicio');
        $entreno->repeticiones = $request->input('repeticiones');
        $entreno->tipo = $request->input('tipo');
        $entreno->duracion = $request->input('duracion');
        $entreno->descanso = $request->input('descanso');
        $entreno->id_user = $request->input('id_user');

        //Executamos a sentencia
        $entreno->save();
        //devolvemos a páxina de entrenos
        return redirect()->to('entrenos')->with('success', 'O entreno foi actualizada correctamente');
    }

    /**
     * eliminar entreno según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $entreno = Entreno::findOrFail($id);
        //Executamos 
        $entreno->delete();
        //Recargamos a páxina
        return redirect()->to('entrenos')->with('success', 'O entreno foi eliminada correctamente');
    }
}
