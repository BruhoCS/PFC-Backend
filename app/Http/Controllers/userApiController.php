<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userApiController extends Controller
{
     /**
     * LISTAR todos los usuarios + su perfil.
     * GET /api/usuarios
     */
    public function index()
    {
        $users = User::with('perfil')->get();
        return response()->json($users, 200);
    }

    /**
     * CREAR usuario + perfil.
     * POST /api/usuarios
     */
    public function store(Request $request)
    {
        $request->validate([
            // User
            "name"      => "required|string|max:100",
            "email"     => "required|email|unique:users,email",
            "password"  => "required|string|min:6",
            "rol"       => "required|in:user,admin",
            "id_plan" => "required|exists:plan,id",

            // Perfil
            "apellido"  => "required|string",
            "telefono"  => "required|string|max:30",
            "direccion" => "required|string|max:150",
            "hobby"     => "required|string|max:150",
        ]);

        // Crear usuario
        $user = User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => Hash::make($request->password),
            "rol"      => $request->rol,
            "id_plan"  => $request->id_plan
        ]);

        // Crear perfil asociado
        $perfil = Perfil::create([
            "id_user"   => $user->id,
            "apellido"  => $request->apellido,
            "telefono"  => $request->telefono,
            "direccion" => $request->direccion,
            "hobby"     => $request->hobby,
        ]);

        return response()->json([
            "user"   => $user,
            "perfil" => $perfil
        ], 201);
    }

    // MOSTRAR un usuario + su perfil
    public function show(User $user)
    {
        $user->load('perfil');
        return response()->json($user, 200);
    }

    //Actualizar el usuario + perfil
    public function update(Request $request, User $user)
    {
        $request->validate([
            // User
            "name"      => "nullable|string|max:100",
            "email"     => "nullable|email|unique:users,email,".$user->id,
            "password"  => "nullable|string|min:6",
            "rol"       => "nullable|in:user,admin",

            // Perfil
            "apellido"  => "nullable|string",
            "telefono"  => "nullable|string|max:30",
            "direccion" => "nullable|string|max:150",
            "hobby"     => "nullable|string|max:150",
        ]);

        // Actualizar user
        if ($request->filled("name"))     $user->name = $request->name;
        if ($request->filled("email"))    $user->email = $request->email;
        if ($request->filled("rol"))      $user->rol = $request->rol;
        if ($request->filled("password")) $user->password = Hash::make($request->password);
        $user->save();

        // Actualizar perfil
        $perfil = $user->perfil;
        if ($request->filled("apellido"))  $perfil->apellido = $request->apellido;
        if ($request->filled("telefono"))  $perfil->telefono = $request->telefono;
        if ($request->filled("direccion")) $perfil->direccion = $request->direccion;
        if ($request->filled("hobby"))     $perfil->hobby = $request->hobby;
        $perfil->save();

        return response()->json([
            "user"   => $user,
            "perfil" => $perfil
        ], 200);
    }

    // ELIMINAR usuario + perfil

    public function destroy(User $user)
    {
        // Eliminar perfil primero
        $user->perfil()->delete();

        // Luego usuario
        $user->delete();

        return response()->json(["message" => "Usuario y perfil eliminados correctamente"], 200);
    }
    
    //Función que se encarga de que el usuario pueda apuntarse a un plan del gym
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
