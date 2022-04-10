<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $user = $this->User::findOne();
        return response('User authenticated', 200);
    }

    public function signout(Request $request)
    {
        # code...
    }
}