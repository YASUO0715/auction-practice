<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return $items;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        // インスタンスの作成
        $item = new Item;

        // 値の用意
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->seller = $request->seller;
        $item->email = $request->email;
        $item->image_url = $request->image_url;

        // インスタンスに値を設定して保存
        $item->save();

        // 登録後のデータを返す(idが追加される)
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Itemモデルから1件を取得
        $item = Item::find($id);
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        // ここはidで探して持ってくる以外はstoreと同じ
        $item = Item::find($id);

        // 値の用意
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->seller = $request->seller;
        $item->email = $request->email;
        $item->image_url = $request->image_url;

        // 保存
        $item->save();

        // 更新後のデータを返す
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
    }
}
