<?php

namespace App\Http\Controllers;

use App\Models\Good;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct() 
    {
        $this->middleware('profile');
    }

    public function profile_index() 
    {
        return view('profile.profile');
    }
    public function profile(Request $request) 
    {
        //stor data 
        $good = new Good;
        $good->name = $request->input('name');
        $good->price = $request->input('price');
        $good->user_id = session('id');
        $good->img_src = 'a';
        $good->save();

    }
}
