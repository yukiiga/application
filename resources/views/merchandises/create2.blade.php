<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
    </head>
    <body>
        <h1>Smart Shopper's</h1>
        <form action="/mypage" method="POST">
            @csrf
            <div class="day">
                <h2>日付</h2>
                <input type="date" name="merchandise[day]" value="{{ old('merchandise.day') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('merchandise.day') }}</p>
            </div>
            <div class="shop">
                <h2>店舗</h2>
                <select name="merchandise[shop_id]">
                    @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="name">
                <h2>商品名</h2>
                <textarea name="merchandise[name]" placeholder="商品名">{{ old('merchandise.name') }}</textarea>
                <p class="address__error" style="color:red">{{ $errors->first('merchandise.name') }}</p>
            </div>
            <div class="price">
                <h2>価格</h2>
                <input type="integer" name="merchandise[price]" placeholder="000" value="{{ old('merchandise.price') }}"/>
                <p class="open__error" style="color:red">{{ $errors->first('merchandise.price') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/mypage/shops">back</a>]</div>
    </body>
</html>