<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * アイテム一覧
     * 
     * @param Request $request
     * @return Request
     */
    public function items()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    /**
     * アイテム登録
     * 
     * @param Request $request
     * @return Request
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:225',
        ]);

        // アイテム作成
        Item::create([
            'user_id' => 0,
            'name' => $request->name,
            'type_id' => $request->type_id,
            'detail' => $request->detail
        ]);
        return redirect()-> route('items');
    }

    /**
     * アイテム編集
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:225',
        ]);

        $item = Item::find($id);

        // アイテム状態の更新
        $item->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'detail' => $request->detail,
        ]);
        return redirect()->route('items');
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