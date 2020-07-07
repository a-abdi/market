<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\GoodsRepositoryInterface;


class GoodsController extends Controller
{
    protected $good;
    public function __construct(GoodsRepositoryInterface $good) 
    {
        $this->good = $good;
    }

    public function get_image_info(Request $request, $image_id) {
    //    dd($image_id);
        if(!$this->good->find($image_id)) {
            abort(404);       
        }   
        $data = $this->good->with('user');
        // $data = DB::table('goods')
        //     ->join('users', 'goods.user_id', '=', 'users.id')
        //     ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
        //     ->where('goods.id', $image_id)
        //     ->get();
            // $data=$data['0'];

        return view('goods.information',['data'=>$data[0]]);
        

    }
}
