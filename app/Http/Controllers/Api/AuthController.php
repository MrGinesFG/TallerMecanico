<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'mecanico' // Asignación inicial por defecto
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario registrado exitosamente. Requiere autorización jerárquica.',
            'user' => $user
        ], 201);
    }

   public function login(Request $request)
    {
        // 1. Validamos que el cliente envíe el email y la contraseña
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Buscamos al usuario en la base de datos por su email
        $user = User::where('email', $request->email)->first();

        // 3. Si el usuario no existe o la contraseña no coincide, rebotamos la petición
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Las credenciales proporcionadas son incorrectas.'
            ], 401);
        }

        // 4. ¡Magia de Sanctum! Generamos un token único para este usuario
        $token = $user->createToken('api_token')->plainTextToken;

        // 5. Respondemos con el token, el tipo y los datos del usuario (¡así saben qué rol tiene!)
        return response()->json([
            'status' => 'success',
            'message' => 'Autenticación exitosa.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'rol' => $user->rol // Puede ser admin o mecanico
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        // Revocar (borrar) el token que el usuario usó para esta sesión
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada correctamente y token eliminado.'
        ], 200);
    }
}
