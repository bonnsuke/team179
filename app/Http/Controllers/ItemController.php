<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
   

     public function index(Request $request)
     {
      
      $keyword = $request->input('keyword');
      if(!empty($keyword)) {
          $items =Item::where('name', 'LIKE', "%{$keyword}%")
          ->orwhere('type_name', 'LIKE', "%{$keyword}%") 
          ->orwhere('detail', 'LIKE', "%{$keyword}%")
          ->join('types', function($join){
           $join->on('items.type_id', 'types.id');})
          ->get();
        }else{
            $items = Item::join('types', function($join){
            $join->on('items.type_id', 'types.id');
          })->get();
        }

        return view('items.index',compact('items'));
     }

     public function search(Request $request)
     {
      $keyword = $request->input('keyword');
      if(!empty($keyword)) {
          $items=Item::where('name', 'LIKE', "%{$keyword}%")
          ->orwhereHas('items', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%{$keyword}%");
          })->get();
        }
        return view('items.index',compact('items'));
      }

      public function showAdmin(Request $request,$id)
      {
          $item = User::find($id);
          return view('item.index',compact('item'));
      }

}