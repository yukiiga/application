<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
    </head>
    <body>
        <h1>Smart Shopper's</h1>
        <form action="/mypage/shops" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>店舗名</h2>
                <input type="text" name="shop[name]" placeholder="店舗名を入力してください。" value="{{ old('shop.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('shop.name') }}</p>
            </div>
            <div class="address">
                <h2>住所</h2>
                <textarea name="shop[address]" placeholder="〇〇県〇〇市〇-〇〇-〇〇">{{ old('shop.address') }}</textarea>
                <p class="address__error" style="color:red">{{ $errors->first('shop.address') }}</p>
            </div>
            <div class="open">
                <h2>営業時間</h2>
                <input type="time" name="shop[open]" placeholder="00:00" value="{{ old('shop.open') }}"/>~<input type="time" name="shop[close]" placeholder="00:00" value="{{ old('shop.close') }}"/>
                <p class="open__error" style="color:red">{{ $errors->first('shop.open') }}</p>
                <p class="close__error" style="color:red">{{ $errors->first('shop.close') }}</p>
            </div>
            <div class="tel">
                <h2>電話番号</h2>
                <textarea name="shop[tel]" placeholder="012-345-6789">{{ old('shop.tel') }}</textarea>
                <p class="tel__error" style="color:red">{{ $errors->first('shop.tel') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image_url">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/mypage/shops">back</a>]</div>
    </body>
</html>