<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Type;

class ItemController extends Controller
{
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
        $types = Type::all();
        return view('create', compact('types'));
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
        $types = Type::all();
        $item = Item::find($id);
        return view('edit', compact('item', 'types'));
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


}
