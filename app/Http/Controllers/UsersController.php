<?php

namespace App\Http\Controllers;

use Cookie;
use App\Models\Post;
use App\Models\User;
use App\Models\Good;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Facades\App\Models\SharedModel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateGoodsRequest;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\GoodsRepositoryInterface;
use App\Contracts\Repositories\CommentRepositoryInterface;


class UsersController extends Controller
{
    protected $good;
    protected $comment;
    protected $user;

    public function __construct(GoodsRepositoryInterface $good, CommentRepositoryInterface $comment,UserRepositoryInterface $user)                           
    {
        $this->middleware('users');
        $this->good = $good;
        $this->comment = $comment;
        $this->user = $user;
    }

    public function users_goods_create_index() 
    {
        Cookie::queue('user_id', session()->get('user_id'));
        return view('users.goods.create');
    }

    public function users_goods_create(UserCreateGoodsRequest $request) 
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

    public function user_ordering_new(){
        return view('users/odering/new');
    }

    public function comments_view(){
        
    }

    public function comments_create(Request $request, $post_id){
        $comment = new Comment();
        $comment->parent_id = $request->get('parent_id');
        $comment->body = $request->get('comment_body');
        $comment->user_id = session('user_id');
        $comment->post_id = $post_id;
        $comment->save();
        $last_comment = $this->comment->get_comments_data($comment->post_id)->last();
        return response()->json([
            'comment'=>$last_comment
        ]);
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
        return view('users.my_goods', ['data'=>$goods]);
    }

}
