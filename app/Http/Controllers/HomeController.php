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
        $response = DB::table('goods')
            ->join('users', 'goods.user_id', '=', 'users.id')
            ->select('users.first_name','users.last_name','users.email','goods.id','goods.name','goods.price','goods.img_src','goods.created_at')
            ->get();
        
        return $response;
    }
}
