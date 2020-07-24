<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Models\SharedModel;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\GoodsRepositoryInterface;
use App\Contracts\Repositories\CommentRepositoryInterface;


class GoodsController extends Controller
{
    protected $good;
    protected $comment;
    public function __construct(GoodsRepositoryInterface $good, CommentRepositoryInterface $comment) 
    {
        $this->good = $good;
        $this->comment = $comment;
    }

    public function goods_view(Request $request, $image_id) {
        if(!$this->good->find($image_id)) {
            abort(404);       
        }   
        $goods = $this->good->get_goods_data($image_id);
        $comments = $this->comment->get_comments_data($goods->post_id);
        SessionModel::refresh_session();
        SessionModel::user_set_session($goods->post_id);
        return view('goods.information',compact('comments', 'goods'));
    }
}
