<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth1Controller extends Controller
{
    public function login_index()
    {
        return view('auth.login1');
    }
    public function register_index()
    {
        return view('auth.register1');
    }
}
