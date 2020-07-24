<?php

namespace App\Contracts\Repositories;


interface CommentRepositoryInterface
{
    public function get_comments_data($post_id);
}