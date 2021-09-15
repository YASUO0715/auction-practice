<?php

namespace App\Http\Controllers;
// Itemクラスを読み込む
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $items = Item::all();
        // Itemsティレクトリーの中のindexページを指定し、itemsの連想配列を代入
        return view('items.index', ['items' => $items]);
    }


    // showページへ移動
    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show', ['item' => $item]);
    }
}
