<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MygoodsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('mygoods');
    }

    public function my_goods() 
    {
        $user_id = session('id');
        $data = DB::table('goods')
            ->join('users', 'goods.user_id', '=', 'users.id')
            ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
            ->where('user_id', $user_id)
            ->paginate(5);
        // dd($data);
        return view('mygoods.mygoods',['data'=>$data]);
    }
}
