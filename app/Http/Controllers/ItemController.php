<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
   

     public function index(Request $request)
     {
        $items = Item::query();
        return view('items.index',compact('items'));
     }

     public function search(Request $request)
     {
      $keyword = $request->input('keyword');
      if(!empty($keyword)) {
          $items->where('name', 'LIKE', "%{$keyword}%")
          ->orwhereHas('items', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%{$keyword}%");
          })->get();
        }
        return redirect("items"); 
      }
}