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

			return response('User authenticated', 200);
    }

    public function signout(Request $request)
    {
        # code...
    }
}
