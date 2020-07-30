<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use App\Contracts\Repositories\GoodsRepositoryInterface;

class GoodsController extends Controller
{
    protected $goods;
    public function __construct(GoodsRepositoryInterface $goods) 
    {
        $this->goods = $goods;
    }

    public function goods_information_view(Request $request, $goods_id) {
        if(!$this->goods->find($goods_id)) {
            abort(404);       
        }

        Cookie::queue('goods_id', $goods_id, 60, null, null, false, false);
        return view('goods.information', [ 'goods' => $this->goods->get_goods_information($goods_id) ]);
    }
}
