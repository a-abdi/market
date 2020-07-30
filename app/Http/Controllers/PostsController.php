<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PostRepositoryInterface;

class PostsController extends Controller
{
    protected $post;
    public function __construct(PostRepositoryInterface $post) 
    {
        $this->post = $post;
    }
}