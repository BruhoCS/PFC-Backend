<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilApiController extends Controller
{
    /**
     * Ver la lista completa de perfiles
     */
    public function index()
    {
        $perfiles = Perfil::all();
        $users = User::all();
        return response()->json(['perfiles' => $perfiles, 'users' => $users]);
    }

    /**
     * Guardar el nuevo perfil
     */
    public function store(Request $request)
    {
        //Validamos o valor introducido
        $request->validate([
            //Usuario
            "nombre" => "required|string|max:100",
            "email" => "required|string",
            "password" => "required|string",
            "rol" => "required|in:admin,user",
            //perfil
            "apellido" => "required|string",
            "direccion" => "required|string|max:100",
            "telefono" => "required|string|max:50",
            "hobby" => "required|string|min:1|max:100",
        ]);

       
        //Objeto de usuario
        $user = User::create($request->all());
         //Obxeto de perfil
        $perfil = Perfil::create($request->all());
        //Lo devolvemos como un JSON
        return response()->json([$perfil, $user], 201);
    }

    /**
     * modificar perfil
     */
    public function update(Request $request, $id)
    {
        // Buscamos el perfil
        $perfil = Perfil::find($id);
        // Buscamos usuario segun id 
        $user = User::find($perfil->id_user);

        //Validanse os campos
        $request->validate([
            //Usuario
            "nombre" => "required|string|max:100",
            "email" => "required|string",
            "password" => "required|string",
            "rol" => "required|in:admin,user",
            //Perfil
            "apellido" => "required|string",
            "direccion" => "required|string|max:100",
            "telefono" => "required|string|max:50",
            "hobby" => "required|string|min:1|max:100",
        ]);
        // Actualizamos el perfil
        $perfil->update($request->all());
        //Objeto de usuario
        $user->update($request->all());
        //Lo devolvemos como un JSON
        return response()->json([$perfil, $user], 201);
    }

    /**
     * eliminar perfil según $id
     */
    public function destroy($id)
    {
        //Buscamos el perfil
        $perfil = Perfil::find($id);
        //Si no existe indicamos al usaurio
        if (!$perfil) {
            return response()->json(['error' => "No se encontró el Perfil"], 404);
        }
        //Si existe borramos el perfil
        $perfil->delete();
        return response()->json(['message' => 'perfil borrado exitosamente'], 200);
    }
}
