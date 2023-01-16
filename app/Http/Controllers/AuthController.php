<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
			if(Auth::attempt($request->toArray())) {
				$token = Auth::user()->createToken('login');
				return response()->json(
					[
						'token' => $token->plainTextToken,
						'token_id' => $token->accessToken->getAttributeValue('id')
					],
					Response::HTTP_OK
				);
			} else {
				return response()->json(['message' => __('passwords.user')], Response::HTTP_NOT_FOUND);
			}
    }

    public function logout(Request $request)
    {
			$user = User::find($request->user_id);
			$is_token_deleted = $user->tokens()->where('id', $request->token_id)->delete();

			if($is_token_deleted) {
				return response()->json(['message' => 'Logout successfully'], Response::HTTP_OK);
			}

			return response()->json(['message' => 'Something wrong happened'], Response::HTTP_BAD_REQUEST);
    }
}
