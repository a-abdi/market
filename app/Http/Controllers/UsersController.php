<?php

namespace App\Http\Controllers;

use Cookie;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateGoodsRequest;

class UsersController extends Controller
{
    public function __construct() 
    {
        $this->middleware('users');
    }

    public function users_create_goods_index() 
    {
        Cookie::queue('user_id', session()->get('user_id'));
        return view('users.goods.create');
    }

    public function users_create_goods(UserCreateGoodsRequest $request) 
    {    
        //store image to disk
        $img =  $request->file('image');
        $img_name = $img->store('images','public'); 
        $img_src = 'storage/'.$img_name;
        
        //store data to database 
        $this->store_goods($request,$img_src);
    }

    //function store
    public function store_goods($request,$img_src) {
        $good = new Good; 
        $good->name = $request->input('name');
        $good->price = $request->input('price');
        $good->user_id = session('user_id');
        $good->img_src = $img_src;
        $good->save();
    }

    public function user_exit() {
        session()->flush();
        return redirect('users/login');
    }

    public function get_user_goods($user_id) 
    {
        if($user_id != session()->get('user_id')) {
            abort(404);
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
