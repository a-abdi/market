<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
}
