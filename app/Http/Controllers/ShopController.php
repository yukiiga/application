<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Flyer;
use App\Models\Merchandise;
use App\Http\Requests\ShopRequest; // useする
use Cloudinary;

class ShopController extends Controller
{
    public function index(Shop $shop)
    {
        return view('shops.index')->with(['shops' => $shop->getPaginateByLimit()]);
    }
    public function index4(Shop $shop)
    {
        return view('shops.index4')->with(['shops' => $shop->getPaginateByLimit()]);
    }
    public function show(Shop $shop)
    {
        return view('shops.show')->with(['shop' => $shop]);
    }
    public function show2(Shop $shop, Flyer $flyer)
    {
        return view('shops.show2')->with(['shop' => $shop, 'flyer' => $flyer]);
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
