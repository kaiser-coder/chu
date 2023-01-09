<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
			$user = User::where($request->all())->firstOrFail();

			if($user) {
				$token = $user->createToken($user);
				return response()->json(['token' => $token->plainTextToken], Response::HTTP_OK);
			} else {
				return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
			}

    }

    public function signout(Request $request)
    {
        # code...
    }
}
