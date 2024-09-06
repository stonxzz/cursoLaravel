<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)  {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            
        ];

        //Esta devuelve un boolean dependiendo si la autenticacion fue exitosa
        if(Auth::attempt($credentials)){
            $token = Auth::user()->createToken('myapptoken')->plainTextToken();

            return response()->json($token);
        } 
        return response()->json("Usuario y/o contraseña incorrecta");

    }
}
