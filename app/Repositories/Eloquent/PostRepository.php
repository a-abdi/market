<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Repositories\PostRepositoryInterface;


class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $model;
   
    public function __construct(Post $model)
    {
        $this->model = $model;
        parent::setModel($model);
    }

}