<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
			$user = User::firstWhere(['email' => $request->email]);

			if($user) {
				if(Hash::check($request->password, $user->password)) {
					$token = $user->createToken($user);
					return response()->json(['token' => $token->plainTextToken], Response::HTTP_OK);
				}

				return response()->json(['message' => __('validation.password')], Response::HTTP_NOT_FOUND);
			} else {
				return response()->json(['message' => __('passwords.user')], Response::HTTP_NOT_FOUND);
			}

    }

    public function logout(Request $request)
    {
        # code...
    }
}
