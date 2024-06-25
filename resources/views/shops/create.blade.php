<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
        <title>Smart Shopper's</title>
    </head>
    <body>
        <h1 class="title">Smart Shopper's</h1>
        <form action="/mypage/shops" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="Form">
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Required">必須</span>店舗名
                    </p>
                    <input type="text" class="Form-Item-Input" name="shop[name]" placeholder="店舗名を入力してください。" value="{{ old('shop.name') }}"/>
                    <p class="name__error" style="color:red">{{ $errors->first('shop.name') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Optional">任意</span>住所
                    </p>
                    <textarea class="Form-Item-Input" name="shop[address]" placeholder="〇〇県〇〇市〇-〇〇-〇〇">{{ old('shop.address') }}</textarea>
                    <p class="address__error" style="color:red">{{ $errors->first('shop.address') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Optional">任意</span>営業時間
                    </p>
                    <input type="time" class="Form-Item-Input" name="shop[open]" placeholder="00:00" value="{{ old('shop.open') }}"/>~<input type="time" class="Form-Item-Input" name="shop[close]" placeholder="00:00" value="{{ old('shop.close') }}"/>
                    <p class="open__error" style="color:red">{{ $errors->first('shop.open') }}</p>
                    <p class="close__error" style="color:red">{{ $errors->first('shop.close') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Optional">任意</span>電話番号
                    </p>
                    <textarea class="Form-Item-Input" name="shop[tel]" placeholder="012-345-6789">{{ old('shop.tel') }}</textarea>
                    <p class="tel__error" style="color:red">{{ $errors->first('shop.tel') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Optional">任意</span>店舗画像
                    </p>
                    <input type="file" name="image_url">
                </div>
                <input type="submit" class="Form-Btn" value="保存する">
            </div>
        </form>
        <div class="back"><a href="/mypage/shops">戻る</a></div>
    </body>
</html>