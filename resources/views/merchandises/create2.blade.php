<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <link rel="stylesheet" href="{{ asset('css/create2.css') }}">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        <form action="/mypage" method="POST">
            @csrf
            <div class="Form">
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Required">必須</span>日付
                    </p>
                    <input type="date" class="Form-Item-Input" name="merchandise[day]" value="{{ old('merchandise.day') }}"/>
                    <p class="name__error" style="color:red">{{ $errors->first('merchandise.day') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Required">必須</span>店舗
                    </p>
                    <select class="Form-Item-Input" name="merchandise[shop_id]">
                        @foreach($shops as $shop)
                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Required">必須</span>商品名
                    </p>
                    <textarea class="Form-Item-Input" name="merchandise[name]" placeholder="商品名">{{ old('merchandise.name') }}</textarea>
                    <p class="address__error" style="color:red">{{ $errors->first('merchandise.name') }}</p>
                </div>
                <div class="Form-Item">
                    <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Required">必須</span>価格
                    </p>
                    <input type="integer" class="Form-Item-Input" name="merchandise[price]" placeholder="000" value="{{ old('merchandise.price') }}"/>
                    <p class="open__error" style="color:red">{{ $errors->first('merchandise.price') }}</p>
                </div>
                <input type="submit" class="Form-Btn" value="保存する">
            </div>
        </form>
        <div class="back"><a href="/mypage">戻る</a></div>
    </body>
</html>