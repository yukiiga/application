<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        @if (Route::has('login'))
            <div>
                <a href="{{ route('login') }}" class='login'>ログイン</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class='register'>新規登録</a>
                @endif
            </div>
        @endif
        <h2>店舗一覧</h2>
        <div class='shops'>
            @foreach ($shops as $shop)
                <div class='shop'>
                    <h3 class='title'>
                        <a href="/shops/{{ $shop->id }}">{{ $shop->name }}</a>
                    </h3>
                    <p class='address'>{{ $shop->address }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $shops->links() }}
        </div>
    </body>
</html>