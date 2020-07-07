<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Repositories\GoodsRepositoryInterface;

class HomeController extends Controller
{
    protected $good;

    public function __construct(GoodsRepositoryInterface $good) 
    {
        $this->good = $good;
    }

    public function index()
    {
        return view('home');
    }
    public function goods()
    {
        return $this->good->join_goods_users();
    }
}
