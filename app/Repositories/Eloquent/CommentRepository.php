<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\CommentRepositoryInterface;


class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    protected $model;
   
    public function __construct(Comment $model)
    {
        $this->model = $model;
        parent::setModel($model);
    }

    public function get_comments_data($post_id) {
        return  DB::table('users')
                ->join('comments', 'comments.user_id', '=', 'users.id')
                ->select('users.first_name','users.last_name','users.email','comments.body','comments.id','comments.parent_id','comments.post_id', 'comments.created_at')
                ->where('comments.post_id', $post_id)
                ->get();
    }
    

}