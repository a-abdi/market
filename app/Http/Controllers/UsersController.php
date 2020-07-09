<?php

namespace App\Http\Controllers;

use Cookie;
use App\Models\User;
use App\Models\Good;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Facades\App\Models\SharedModel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateGoodsRequest;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\GoodsRepositoryInterface;


class UsersController extends Controller
{
    protected $good;

    public function __construct(GoodsRepositoryInterface $good) 
    {
        $this->middleware('users');
        $this->good = $good;
    }

    public function users_create_goods_index() 
    {
        Cookie::queue('user_id', session()->get('user_id'));
        return view('users.goods.create');
    }

    public function users_create_goods(UserCreateGoodsRequest $request) 
    {    
        $img_src = SharedModel::store_file($request->file('image'), 'images', 'public');
        $good = SharedModel::create_object_good($request, $img_src);
        $new_good = $this->good->create((array) $good);
    }

    public function user_exit() {
        session()->flush();
        return redirect('users/login');
    }
    
    public function user_profile() {
        return view('users/profile');
    }

    public function get_user_goods($user_id) 
    {
        if($user_id != session()->get('user_id')) {
            abort(404);
        }
        $goods = $this->good->with_paginate('user', 5);
        // $data = DB::table('goods')
        //     ->join('users', 'goods.user_id', '=', 'users.id')
        //     ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
        //     ->where('user_id', $user_id)
        //     ->paginate(5);
        // // dd($data);
        return view('users.goods', ['data'=>$goods]);
    }

}
