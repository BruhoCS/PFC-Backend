<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use App\Models\Perfil;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilControll extends Controller
{
    /**
     * Ver la lista completa de perfiles
     */
    public function index()
    {
        $perfiles = Perfil::all();
        $users = User::all();
        return view('perfiles')->with(['perfiles' => $perfiles, 'users' => $users]);
    }

    /**
     * cargar la vista para crear un nuevo perfil
     */
    public function create()
    {
        $perfil = new Perfil();
        $user = new User();
        $planes = Plan::all();
        return view("nuevoUsuario")->with(['perfil' => $perfil, 'user' => $user, 'planes' => $planes]);
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

        //Obxeto de perfil
        $perfil = new Perfil();
        //Objeto de usuario
        $user = new User();
        //Guardamos los campos de usuario
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->rol = $request->input('rol');
        $user->id_plan = $request->input('plan');
        $user->save();
        //Guardamos los campos de perfil
        $perfil->apellido = $request->input('apellido');
        $perfil->direccion = $request->input('direccion');
        $perfil->telefono = $request->input('telefono');
        $perfil->hobby = $request->input('hobby');
        $perfil->id_user = $user->id;
        //Executamos a sentencia
        $perfil->save();

        //Rediriximos ao usuario a táboa de perfiles
        return redirect()->to('perfiles')->with('success', 'A perfil foir creada correctamente');
    }

    public function show($id)
    {
        //Buscamos el perfil
        $perfil = Perfil::find($id);
        //Si no se encuentra el perfil
        if (!$perfil) {
            //Redirigimos mostrando un mensaje de error
            return redirect()->route('inicio')->with('error', 'Perfil no encontrado.');
        }
        //Enviamos mas datos del usuario
        $user = User::find($perfil->id_user);
        //Devolvemos la vista
        return view("perfil")->with(['perfil' => $perfil, 'user' => $user]);
    }
    /**
     * cargar la vista para modificar perfil
     */
    public function edit($id)
    {
        $perfil = Perfil::findOrFail($id);
        $user = User::find($perfil->id_user);
        $deportes = Deporte::all();
        $planes = Plan::all();
        return view('nuevoPerfil')->with(['perfil' => $perfil, 'planes' => $planes, 'user' => $user, 'deportes' => $deportes]);
    }

    /**
     * modificar perfil
     */
    public function update(Request $request, $id)
    {
        //Validanse os campos
        $request->validate([
            //Usuario
            "name" => "required|string|max:100",
            "email" => "required|string",
            "password" => "required|string",
            "rol" => "required|in:admin,user",
            "id_plan" => "required",
            "id_deporte" => "nullable|array",
            "id_deporte.*" => "exists:deporte,id",
            //Perfil
            "apellido" => "required|string",
            "direccion" => "required|string|max:100",
            "telefono" => "required|string|max:50",
            "hobby" => "required|string|min:1|max:100",
        ]);
        $perfil = Perfil::find($id);
        $user = User::find($perfil->id_user);

        // Busca el usuario o créalo si no existe
        $user = User::updateOrCreate(
            ["name" => $request->name], // Busca por nombre
            $request->only(["name", "email", "password", "rol", "id_plan"])
        );
        $user->save();
        //Guardamos los campos de perfil
        $perfil->apellido = $request->input('apellido');
        $perfil->direccion = $request->input('direccion');
        $perfil->telefono = $request->input('telefono');
        $perfil->hobby = $request->input('hobby');
        //Executamos a sentencia
        $perfil->save();

        // Si el usuario tiene deportes
        if ($request->has('id_deporte')) {
            $user->deportes()->sync($request->id_deporte); // sincronizacion tabla pivote
        }

        //Enciptar la contraseña si se actualiza
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        //devolvemos a páxina de perfiles
        return redirect()->to('/')->with('success', 'O perfil foi actualizada correctamente');
    }

    /**
     * eliminar perfil según $id
     */
    public function destroy($id)
    {
        //Atopamos o id
        $perfil = Perfil::findOrFail($id);
        $user = User::findOrFail($perfil->id_user);
        //Executamos 
        $perfil->delete();
        $user->delete();
        //Recargamos a páxina
        return redirect()->to('perfiles')->with('success', 'O perfil foi eliminada correctamente');
    }
}
