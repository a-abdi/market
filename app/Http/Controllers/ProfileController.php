<?php

namespace App\Http\Controllers;

use App\Models\Good;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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
        //store image to disk
        $img_src=$this->store_img($request);
        //store data to database 
        $this->store($request,$img_src);
    }

    //function store
    public function store($request,$img_src){
        $good = new Good;
        $good->name = $request->input('name');
        $good->price = $request->input('price');
        $good->user_id = session('id');
        $good->img_src = $img_src;
        $good->save();
    }

    public function store_img($request){
        $img_name =  $request->file('image')->store('images','public');
        return 'storage/'.$img_name;
    }

}
