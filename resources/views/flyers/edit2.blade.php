<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <link rel="stylesheet" href="{{ asset('css/edit2.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">Smart Shopper's</h1>
        <form action="/mypage/shops/{{ $shop->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="Form">
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                            <span class="Form-Item-Label-Required">必須</span>チラシ
                        </p>
                        <input type="file" name="image_url" value="{{ $flyer->image_url }}">
                        <p class="title__error" style="color:red">{{ $errors->first('image_url') }}</p>
                    </div>
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                            <span class="Form-Item-Label-Required">必須</span>期間
                        </p>
                        <input type="date" class="Form-Item-Input" name="flyer[from_period]" value="{{ $flyer->from_period }}"/>~<input type="date" class="Form-Item-Input" name="flyer[to_period]" value="{{ $flyer->to_period }}"/>
                        <p class="open__error" style="color:red">{{ $errors->first('flyer.from_period') }}</p>
                        <p class="close__error" style="color:red">{{ $errors->first('flyer.to_period') }}</p>
                    </div>
                    <input type="submit" class="Form-Btn" value="保存する">
                </div>
        </form>
        <div class="back">
            <a href="/mypage/shops/{{ $shop->id }}">戻る</a>
        </div>
    </body>
</html>