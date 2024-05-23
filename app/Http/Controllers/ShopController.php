<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(Shop $shop)//インポートしたShopをインスタンス化して$shopとして使用。
    {
        return view('shops.index')->with(['shops' => $shop->getPaginateByLimit()]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function show(Shop $shop)
    {
        return view('shops.show')->with(['shop' => $shop]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create()
    {
    return view('shops.create');
    }
    
    public function store(Request $request, Shop $shop)
    {
    $input = $request['shop'];
    $shop->fill($input)->save();
    return redirect('/shops/' . $shop->id);
    }
}
