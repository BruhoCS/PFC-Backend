<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function loginAPI(Request $request)
    {
        // Validacion de los campos a recibir

        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);

        $credentials = request(['email','password']);

        // Intenta hacer el login con las credenciales enviadas
        if(!Auth::attempt($credentials)){
            // Si no se puede realizar el login devuelve el valor 401
            return response()->json(['message'=>'Unauthorized'],401);
        }

        // Si se completa el login crea un nuevo token para ese usuario
        $user = $request->user();
        $tokenResult = $user->createToken('API Access Token');
        $token = $tokenResult->plainTextToken;

        // Devuelve el token y el tipo de token Bearer con el código de estado 200
        return response()->json([
            'accessToken'=>$token,
            'token_type'=>'Bearer',
            'user'=>[
            'id'    => $user->id,
            'id_plan' =>$user->id_plan,
            'name'  => $user->name,
            'email' => $user->email,
            'rol'   => $user->rol, 
            ]
        ],200);
    }
}
