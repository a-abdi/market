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
        $post_id = $data[0]['post_id'];
        $comments = DB::table('comments')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->where('comments.post_id', $post_id)
                    ->get();
// dd($data[0]);
//         // $result = array_merge($comments, $data[0] );            
//         // $dada = array_merge($data, $comments);
//                     // dd($data);
// $new = array();
// $new = [];
// array_push($new, $date[0]);
// $new = [$date[0],$comments];
// $new = [
//     'name' => $date[0]['name'],
//     'family' => 'moradi'
// ];
        //$new = array( 1, 2);
        // $new[0] = $data[0];
        // $new[1] = $comments;  
        // dd($new);
        $data = $data[0];           
                    
        // $data = DB::table('goods')
        //     ->join('users', 'goods.user_id', '=', 'users.id')
        //     ->select('users.first_name','users.last_name','users.email','users.phone_number','goods.name','goods.price','goods.img_src','goods.created_at')
        //     ->where('goods.id', $image_id)
        //     ->get();
            // $data=$data['0'];
            
            // dd(compact($comments, $data[0]));
        return view('goods.information',compact('comments', 'data'));
        // return view('goods.information',['data'=>$data[0]]);
        

    }
}
