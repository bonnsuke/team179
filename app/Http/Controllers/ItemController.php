<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    /**
     * 商品一覧
     * 
     * @param Request $request
     * @return Response
     */

     public function index(Request $request)
     {
        
        return view('items.index');
     }
}
