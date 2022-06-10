<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $usuario = Auth::user();
            return response()->json(["nome" => $usuario->name, "token" => $usuario->createToken("day")->plainTextToken]);
        }

        return response()->json("Parece que algo não funcionou.", 203);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json("Success");
    }

    public function register(Request $request)
    {
        if ($request->password === $request->confirmationPassword) {
            $usuario = User::create(
                [
                    "name" => $request->name, "password" => Hash::make($request->password),
                    "email" => $request->email
                ]
            );
            return response()->json(["nome" => $usuario->name, "token" => $usuario->createToken("devs")->plainTextToken]);
        } else {
            return response()->json('Parece que algo não funcionou como devia.', 203);
        }
    }
}
