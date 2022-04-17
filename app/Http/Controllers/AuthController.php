<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $user = User::where([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])->firstOrFail();

        if($user) {
            $token = $user->createToken('App Token');
        }
        
        return response()->json(['token' => $token->plainTextToken], 200);
    }

    public function signout(Request $request)
    {
        # code...
    }
}