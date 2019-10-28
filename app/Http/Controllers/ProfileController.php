<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('profile');
    }

    public function profile() {
        return view('profile.profile');
    }
}
