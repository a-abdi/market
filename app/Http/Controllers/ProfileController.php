<?php

namespace App\Http\Controllers;

use App\Models\Good;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Facades\App\Repositories\AuthRepository;

class ProfileController extends Controller
{
    public function __construct() 
    {
        $this->middleware('profile');
    }

    public function profile_index() 
    {
        return view('profile.profile');
    }

    public function profile(Request $request) 
    {    
        $error = AuthRepository::auth_name($request);
        if($error){
            return $error;
        }

        $error = AuthRepository::auth_price($request);
        if($error){
            return $error;
        }

        $error = AuthRepository::auth_image($request);
        if($error){
            return $error;
        }

        //store image to disk
        $img =  $request->file('image');
        $img_name = $img->store('images','public'); 
        $img_src = 'storage/'.$img_name;
        
        //store data to database 
        $this->store_goods($request,$img_src);
    }

    //function store
    public function store_goods($request,$img_src){
        $good = new Good; 
        $good->name = $request->input('name');
        $good->price = $request->input('price');
        $good->user_id = session('id');
        $good->img_src = $img_src;
        $good->save();
    }
}
