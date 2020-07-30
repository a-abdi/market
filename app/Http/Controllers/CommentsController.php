<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Contracts\Repositories\CommentRepositoryInterface;

class CommentsController extends Controller
{
    protected $comment;
    public function __construct(CommentRepositoryInterface $comment) 
    {
        $this->comment = $comment;
    }

    public function goods_comments_view($goods_id) {
        $comments = $this->comment->get_comments_data_by_goods_id($goods_id);
        return response()->json([
            'comments'=>$comments,
        ]);
    }

    public function goods_comments_create(Request $request, $goods_id) {
        $comment = new Comment();
        $comment->parent_id = $request->get('parent_id');
        $comment->body = $request->get('comment_body');
        $comment->user_id = session('user_id');
        $comment->goods_id = $goods_id;
        $comment->save();
        $last_comment = $this->comment->get_comments_data_by_goods_id($comment->goods_id)->last();
        return response()->json([
            'comment'=>$last_comment
        ]);
        
    }
}
