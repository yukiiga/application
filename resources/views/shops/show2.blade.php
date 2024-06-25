<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/show2.css') }}">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        <h2 class='name'>{{ $shop->name }}</h2>
        <div class="content">
            <div class="content__shop">
                <div>
                    <img src="{{ $shop->image_url }}" alt="画像が読み込めません。"/>
                </div>
                <div class="shop_edit">
                    <h3>店舗情報</h3><a href="/mypage/shops/{{ $shop->id }}/edit" class="edit">店舗情報を編集</a>
                </div>
                <h4>住所</h4>
                <p>{{ $shop->address }}</p>
                <h4>営業時間</h4>
                <p>{{ $shop->open }}～{{ $shop->close }}</p>
                <h4>電話番号</h4>
                <p>{{ $shop->tel }}</p>
                <div class="flyer_edit">
                    <h3>チラシ</h3><a href="/mypage/shops/{{ $shop->id }}/edit2" id="add">チラシを追加</a>
                    <div>
                        @foreach($shop->flyers as $flyer)
                            <a href="/mypage/shops/{{ $shop->id }}/flyers/{{ $flyer->id }}"><img src="{{ $flyer->image_url }}" alt="画像が読み込めません。"/></a>
                            <p>期間：{{ $flyer->from_period }}～{{ $flyer->to_period }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <a href="/mypage">戻る</a>
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