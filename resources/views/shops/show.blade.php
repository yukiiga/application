<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h1>Smart Shopper's</h1>
        <h2 class='title'>{{ $shop->name }}</h2>
        <div class="content">
            <div class="content__shop">
                <h3>店舗情報</h3>
                <!--<div>-->
                <!--    <img src="{{ $shop->image_url }}" alt="画像が読み込めません。"/>-->
                <!--</div>-->
                <h4>住所</h4>
                <p>{{ $shop->address }}</p>
                <h4>営業時間</h4>
                <p>{{ $shop->open }}～{{ $shop->close }}</p>
                <h4>電話番号</h4>
                <p>{{ $shop->tel }}</p>
                <h4>チラシ</h4>
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>