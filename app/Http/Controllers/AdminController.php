<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Facades\App\Repositories\SharedRepository;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function adminindex()
    {
        return view('admin.admin_index');
    }
    
    public function admin_users()
    {
        $data = DB::table('users')
        ->select('users.first_name','users.last_name','users.email','users.phone_number','users.created_at')
        ->get();
        // dd($data);
       return view('admin.users', ['data'=>$data]);
    }

    public function admin_goods()
    {
        $data = DB::table('goods')
        ->select('name','price','img_src','created_at','id','user_id')
        ->get();
        
        return view('admin.goods',['data'=>$data]);
    }
    
    public function admin_goods_delete(Request $request)
    {
        DB::table('goods')->delete($request->input('id'));

        // dd($request->input('id'));
    }

    public function good_search(Request $request)
    {
        $data = SharedRepository::admin_goods_search($request->input('value'),$request->input('type'));
        // dd($data);
        return $data;
    }
}
