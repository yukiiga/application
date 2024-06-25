<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        <h2 class='name'>{{ $shop->name }}</h2>
        <div class="content">
            <form action="/mypage/shops/{{ $shop->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="shopname">
                    <input type="hidden" name="shop[name]" value="{{ $shop->name  }}"/>
                    <p class="name__error" style="color:red">{{ $errors->first('shop.name') }}</p>
                </div>
                <div class="Form">
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                            住所
                        </p>
                        <input type='text' class="Form-Item-Input" name='shop[address]' value="{{ $shop->address }}">
                        <p class="address__error" style="color:red">{{ $errors->first('shop.address') }}</p>
                    </div>
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                            営業時間
                        </p>
                        <input type="time" class="Form-Item-Input" name="shop[open]" value="{{ $shop->open }}"/>~<input type="time" class="Form-Item-Input" name="shop[close]" value="{{ $shop->close }}"/>
                        <p class="open__error" style="color:red">{{ $errors->first('shop.open') }}</p>
                        <p class="close__error" style="color:red">{{ $errors->first('shop.close') }}</p>
                    </div>
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                            電話番号
                        </p>
                        <input type='text' class="Form-Item-Input" name='shop[tel]' value="{{ $shop->tel }}">
                        <p class="tel__error" style="color:red">{{ $errors->first('shop.tel') }}</p>
                    </div>
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                            店舗画像
                        </p>
                        <input type="file" name="image_url" value="{{ $shop->image_url }}">
                        <p class="title__error" style="color:red">{{ $errors->first('shop.image_url') }}</p>
                    </div>
                    <input type="submit" class="Form-Btn" value="保存する">
                </div>
            </form>
        </div>
        <div class="back">
            <a href="/mypage/shops/{{ $shop->id }}">戻る</a>
        </div>
        <div class="logout">
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