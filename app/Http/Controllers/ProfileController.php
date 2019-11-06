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
        $img_src = $this->store_img($request);

        if(!$img_src){
            return [
                'error' => 'عکس انتخاب نشده'
            ];
        }

        if(!$request->filled('name')) {
            return [
                'error' => 'نام کالا انتخاب نشده'
            ];
        }
        
        if(!$request->filled('price')) {
            return [
                'error' => 'قیمت کالا تعیین نشده'
            ];
        }
        
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
        $img =  $request->file('image');
        if(!$img){
            return null;
        }
        $img_name = $img->store('images','public'); 
        return 'storage/'.$img_name;
    }

}
