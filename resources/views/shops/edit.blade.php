<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Smart Shopper's</h1>
        <h2 class='title'>{{ $shop->name }}</h2>
        <div class="content">
            <form action="/mypage/shops/{{ $shop->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="title">
                    <input type="hidden" name="shop[name]" value="{{ $shop->name  }}"/>
                    <p class="name__error" style="color:red">{{ $errors->first('shop.name') }}</p>
                </div>
                <div class="image">
                    <h2>店舗画像</h2>
                    <input type="file" name="image_url" value="{{ $shop->image_url }}">
                    <p class="title__error" style="color:red">{{ $errors->first('shop.image_url') }}</p>
                </div>
                <div class="address">
                    <h2>住所</h2>
                    <input type='text' name='shop[address]' value="{{ $shop->address }}">
                    <p class="address__error" style="color:red">{{ $errors->first('shop.address') }}</p>
                </div>
                <div class="open">
                    <h2>営業時間</h2>
                    <input type="time" name="shop[open]" value="{{ $shop->open }}"/>~<input type="time" name="shop[close]" value="{{ $shop->close }}"/>
                    <p class="open__error" style="color:red">{{ $errors->first('shop.open') }}</p>
                    <p class="close__error" style="color:red">{{ $errors->first('shop.close') }}</p>
                </div>
                <div class="tel">
                    <h2>電話番号</h2>
                    <input type='text' name='shop[tel]' value="{{ $shop->tel }}">
                    <p class="tel__error" style="color:red">{{ $errors->first('shop.tel') }}</p>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <div class="footer">
            <a href="/mypage/shops/{{ $shop->id }}">戻る</a>
        </div>
        <div class="mt-3 space-y-1">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </body>
</html>