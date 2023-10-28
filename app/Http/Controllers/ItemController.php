<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemController extends Controller
{
    /**
     * 商品一覧画面
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $count = 0;
        $items = null;
    
        if (!empty($keyword)) {
            $items = Item::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('type_name', 'LIKE', "%{$keyword}%")
                ->orWhere('detail', 'LIKE', "%{$keyword}%")
                ->join('types', function ($join) {
                    $join->on('items.type_id', 'types.id');
                })
                ->select('items.*', 'types.type_name')
                ->get(); // ページネーションを適用する前に全ての検索結果を取得
        } else {
            $items = Item::join('types', function ($join) {
                $join->on('items.type_id', 'types.id');
            })->select('items.*', 'types.type_name')
            ->get(); // ページネーションを適用する前に全ての商品を取得
        }
    
        $count = $items->count();
    
        // ページネーションを適用
        $items = $this->paginateCollection($items, 5); // カスタムのpaginateCollectionメソッドを使用
    
        return view('items.index', compact('items', 'count'));
    }
    
    // カスタムのpaginateCollectionメソッド
    private function paginateCollection($items, $perPage)
    {
        $currentPage = request()->input('page', 1); // 現在のページをリクエストから取得
        $currentPageItems = $items->slice(($currentPage - 1) * $perPage, $perPage); // 現在のページに表示するアイテムをスライス
        $items = new LengthAwarePaginator($currentPageItems, $items->count(), $perPage, $currentPage);
    
        return $items;
    }
    
    /**
     * 商品登録
     */
    public function create()
    {
        // 種別テーブルから全件を取得する
        $types = Type::all();
        // 取得した種別を画面に渡す
        return view('items.create',compact('types'));
    }

    public function store(Request $request)
    {
        // テーブル定義書に合わせて100文字までとする
        $this->validate($request, [
            'name' => 'required|max:100',
            'type_id' => 'required',      
        ]);

        // Auth::id()で現在ログインしているユーザーのIDを取得しています。
        Item::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'type_id' => $request->type_id,
            'detail' => $request->detail
        ]);
        // 商品登録が完了したため商品一覧画面にリダイレクトする
        return redirect()->route('items')->with('flash_message', '商品の登録が完了しました');
    }

    /**
     * アイテム編集
     */
    public function edit($id)
    {
        $item = Item::find($id);
        // 種別テーブルから全件を取得する
        $types = Type::all();
        return view('edit', compact('item','types'));
    }

    public function update(Request $request, $id)
    {
        // テーブル定義書に合わせて100文字までとする
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        $item = Item::find($id);

        // アイテム状態の更新
        $item->update([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'detail' => $request->detail,
        ]);
        return redirect()->route('items')->with('flash_message', '商品の編集が完了しました');;
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect("items")->with('flash_message', '商品の削除が完了しました');
    }
}
