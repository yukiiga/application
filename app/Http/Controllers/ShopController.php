<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Flyer;
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
    public function show2(Shop $shop, Flyer $flyer)
    {
        return view('shops.show2')->with(['shop' => $shop, 'flyer' => $flyer]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create()
    {
        return view('shops.create');
    }
    
    public function store(ShopRequest $request, Shop $shop)
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
    
    public function edit(Shop $shop)
    {
        return view('shops.edit')->with(['shop' => $shop]);
    }
    
    
    public function update(ShopRequest $request, Shop $shop)
    {
        $input_shop = $request['shop'];
        
        if ($request->hasFile('image_url')) {
            // cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
            $image_url = Cloudinary::upload($request->file('image_url')->getRealPath())->getSecurePath();
        } else {
            // 画像が送信されなかった場合、$image_urlをnullに設定
            if ($shop->image_url != null) {
                $image_url = $shop->image_url;
            } else {
                $image_url = null; // 既存の画像URLがない場合はnullに設定
            }
        }
        
        $input_shop += ['image_url' => $image_url];
        $input_user = auth()->id();
        
        $shop->fill($input_shop)->save();
        
        // $shop->user2()->attach($input_user); 
        $shop->user2()->sync([$input_user]); //同じユーザによる複数回の編集を可能に
    
        return redirect('/mypage/shops/' . $shop->id);
    }
}
