<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }
    public function goods()
    {
        return DB::table('users')->join('goods', 'users.id', '=', 'goods.user_id')->get();
    }
}
