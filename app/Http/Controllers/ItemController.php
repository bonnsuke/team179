<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

      // if (!empty($keyword)) {
      //   $items = Item::where(function($query) use($keyword) {
      //     return $query->where('name', 'LIKE', "%{$keyword}%")
      //       ->orWhere('type_name', 'LIKE', "%{$keyword}%")
      //       ->orWhere('detail', 'LIKE', "%{$keyword}%");
      //   })->when(Auth::user()->role == 1, function($query){
      //     $user_id = Auth::user()->id;
      //     return $query->where("user_id", $user_id);
      //   })->get();
      // } else {
        // $items = Item::join('types', function($join){
        //   $join->on('items.type_id', 'types.id');
        // })->when(Auth::user()->role == 1, function($query){
        //   $user_id = Auth::user()->id;
        //   return $query->where("user_id", $user_id);
        // })->get();
      

      return view('items.index',compact('items'));
    }


      public function showAdmin(Request $request, $id)
      {
          $item = User::find($id);
          return view('item.index',compact('items'));
      }

      public function destroy($id)
      {
          $item = Item::find($id);
          $item->delete();
          return redirect("items");
      }

}