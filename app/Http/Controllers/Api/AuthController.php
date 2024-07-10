<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use  Illuminate\Support\Facades\Hash;
use  Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        // Validar dados
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|confirmed"
        ]);

        // Criando usuario
        User::create([
            "name" =>  $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "message" => "User has been created"
        ]);
    }

    public function login (Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            "password" => 'required'
        ]);

        // Check Login
        if(Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ])) {
            // Token se estiver tudo certo
            $user = Auth::user();

            $token = $user->createToken("Access Token")->accessToken;

            return response()->json([
                "message" => "User has been logged",
                "token" => $token
            ]);
        }

        return response()->json([
            "message" => "unauthorized"
        ],401);
    }

    public function profile (Request $request)
    {
        $user = Auth::user();

        return response()->json([
            "data" => $user
        ]);
    }

    public function logout (Request $request)
    {
        auth()->user()->token()->revoke();

        return response()->json([
            "message" => "User has been logged out"
        ]);
    }
}
