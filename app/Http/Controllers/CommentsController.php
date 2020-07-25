<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CommentRepositoryInterface;

class CommentController extends Controller
{
    protected $comment;
    public function __construct(CommentRepositoryInterface $comment) 
    {
        $this->comment = $comment;
    }
}
