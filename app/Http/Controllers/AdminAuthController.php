<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function adminlogin_index()
    {
        return view('admin.auth.login');
    }
}
