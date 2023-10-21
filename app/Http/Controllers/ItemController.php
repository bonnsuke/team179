<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * 商品一覧画面
     */
    public function index(Request $request)
    {
        // 商品一覧画面表示をする際に検索キーワードがある場合、$keywordの変数に値が入ります。
        $keyword = $request->input('keyword');
        // もしも$keywordの変数がNull（false）でなければ$keywordの値を基に商品名と種別名、詳細のいずれかに$keywordの文字列を含んでいるレコードを抽出します。
        if(!empty($keyword)) {
            $items =Item::where('name', 'LIKE', "%{$keyword}%")
            ->orwhere('type_name', 'LIKE', "%{$keyword}%") 
            ->orwhere('detail', 'LIKE', "%{$keyword}%")
            ->join('types', function($join){
            $join->on('items.type_id', 'types.id');})
            ->get();
        // $keywordが入力されていない場合は、商品テーブルと種別テーブルを結合し、トップ画面に渡します。
        }else{
            $items = Item::join('types', function($join){
            $join->on('items.type_id', 'types.id');
            })->get();
        }
        // itemsの配列でトップ画面に渡しています。
        return view('items.index',compact('items'));
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
        return redirect()->route('items');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect("items")->with('flash_message', '商品の削除が完了しました');
    }
}
