<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Facades\App\Models\SharedModel;
use App\Http\Requests\GoodSearchRequest;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function admin_index()
    {
        return view('admin.index');
    }
    
    public function admin_users()
    {
        $data = DB::table('users')
        ->select('users.first_name','users.last_name','users.email','users.phone_number','users.created_at')
        ->get();
       return view('admin.users', ['data'=>$data]);
    }

    public function admin_goods()
    {
        $data = DB::table('goods')
        ->select('name','price','img_src','created_at','id','user_id')
        ->get();
        return view('admin.goods',['data'=>$data]);
    }

    public function admin_goods_js()
    {
        $data = DB::table('goods')
        ->select('name','price','img_src','created_at','id','user_id')
        ->get();
        return $data;
    }

    
    public function admin_goods_delete(Request $request)
    {
        $message = DB::table('goods')->delete($request->input('id'));
        return $message;
    }

    public function admin_good_search(GoodSearchRequest $request)
    {
        $data = SharedModel::goods_search($request->input('value'),$request->input('type'));
        return $data;
    }

    public function admin_users_detail(Request $request, $user_id)
    {
        $users = DB::table('users')
        ->select('users.first_name','users.last_name','users.email','users.phone_number','users.created_at')
        ->where('id','=',$user_id)
        ->get();
        if(!count($users)) {
            abort(404);
        }
        return view('admin.users_detail', ['users'=>$users]);
    }
}
