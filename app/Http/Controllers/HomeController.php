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
        // block adress 192.168.43.83:81/goods for all user
    //    $url = session('_previous');
    // //    dd($url['url']);
    //    if($url['url']!='http://192.168.43.83:81'){
    //     abort(404);
    //    }
       
       

        $response = DB::table('goods')
            ->join('users', 'goods.user_id', '=', 'users.id')
            ->select('users.first_name','users.last_name','users.email','goods.id','goods.name','goods.price','goods.img_src','goods.created_at')
            ->get();
        
        return $response;


    }
}
