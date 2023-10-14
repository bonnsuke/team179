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

     public function admin(Request $request)
     {
     
          $admins=User::whereIn('role_id'[1])->get();
          return view('items.index',compact('items'));
      }

      public function showAdmin(Request $request,$id)
      {
          $item = User::find(1);
          return view('item.index',compact('item'));
      }

}