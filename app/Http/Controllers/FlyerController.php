<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Flyer;
use App\Http\Requests\FlyerRequest; // useする
use Cloudinary;

class FlyerController extends Controller
{
    public function show3(Shop $shop, Flyer $flyer)
    {
        return view('flyers.show3')->with(['shop' => $shop,'flyer' => $flyer]);
     //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function edit2(Shop $shop, Flyer $flyer)
    {
        return view('flyers.edit2')->with(['shop' => $shop, 'flyer' => $flyer]);
    }
    
    public function update2(FlyerRequest $request, Flyer $flyer, Shop $shop)
    {
        
        $input = $request['flyer'];
        
        // 画像が送信されたかどうかを確認
        if ($request->hasFile('flyer.image_url')) {
            // cloudinaryへ画像を送信し、画像のURLを$image_urlに代入
            $image_url = Cloudinary::upload($request->file('flyer.image_url')->getRealPath())->getSecurePath();
        } else {
            // 画像が送信されなかった場合、$image_urlをnullに設定
            $image_url = null;
        }

        $input['image_url']=$image_url;  //追加
        $input['maker_id'] = auth()->id();
        $input['shop_id'] = $shop->id;
        $flyer->fill($input)->save();
    
        return redirect('/mypage/shops/' . $shop->id);
    }
    
    public function update3(Shop $shop, Flyer $flyer)
    {
        $input_user = auth()->id();
        
        $flyer->users()->attach([$input_user]);
    
        return redirect('/mypage/shops/' . $shop->id);
    }
}
