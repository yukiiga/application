<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\ShopRequest; // useする
use Cloudinary;

class ShopController extends Controller
{
    public function index(Shop $shop)//インポートしたShopをインスタンス化して$shopとして使用。
    {
        return view('shops.index')->with(['shops' => $shop->getPaginateByLimit()]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function index2(Shop $shop)//インポートしたShopをインスタンス化して$shopとして使用。
    {
        return view('shops.index2')->with(['shops' => $shop->getPaginateByLimit()]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function show(Shop $shop)
    {
        return view('shops.show')->with(['shop' => $shop]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function show2(Shop $shop)
    {
        return view('shops.show2')->with(['shop' => $shop]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create()
    {
        return view('shops.create');
    
    public function store(Request $request, Shop $shop)
    {
        $input = $request['shop'];
        
        // 画像が送信されたかどうかを確認
        if ($request->hasFile('image_url')) {
            // cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
            $image_url = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
        } else {
            // 画像が送信されなかった場合、$image_urlをnullに設定
            $image_url = null;
        }
        //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
        // $image_url = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
        // dd($image_url);  //画像のURLを画面に表示
        $input += ['image_url' => $image_url];  //追加
        $input['maker_id'] = auth()->id();
        $shop->fill($input)->save();
        return redirect('/mypage/shops/' . $shop->id);
    }
}
