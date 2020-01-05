<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('profile');
    }

    public function get_user_goods($user_id) 
    {
        if($user_id != session()->get('id')) {
            abort(403);
        }

        $data = DB::table('goods')
            ->join('users', 'goods.user_id', '=', 'users.id')
            ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
            ->where('user_id', $user_id)
            ->paginate(5);
        // dd($data);
        return view('users.goods',['data'=>$data]);
    }
}
