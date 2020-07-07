<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Models\SharedModel;
use App\Http\Requests\GoodSearchRequest;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\GoodsRepositoryInterface;

class AdminController extends Controller
{
    protected $user;
    protected $good;
    
    public function __construct(UserRepositoryInterface $user, GoodsRepositoryInterface $good) 
    {
        $this->middleware('admin');
        $this->user = $user;
        $this->good = $good;
    }

    public function admin_index()
    {
        return view('admin.index');
    }
    
    public function admin_users()
    {
        $users = $this->user->select(SharedModel::users_select_except(['id', 'password', 'updated_at'])); 
        return view('admin.users', ['data'=> $users]);
    }

    public function admin_goods()
    {
        $goods = $this->good->select(SharedModel::goods_select_except(['updated_at']));
        return view('admin.goods',['data'=>$goods]);
    }

    public function admin_goods_js()
    {
        return $this->good->select(SharedModel::goods_select_except(['updated_at']));
    }

    
    public function admin_goods_delete(Request $request)
    {
        return $this->good->delete($request->input('id'));
    }

    public function admin_good_search(GoodSearchRequest $request)
    {
        return $this->good->search(SharedModel::goods_select_except(['updated_at']), $request->input('value'), $request->input('type'));
    }

    public function admin_users_detail(Request $request, $user_id)
    {
        $users = $this->user->search(SharedModel::users_select_except(['id', 'password', 'updated_at']), $user_id, 'id');
        if(!count($users)) {
            abort(404);
        }
        return view('admin.users_detail', ['users'=>$users]);
    }
}
