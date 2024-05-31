<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('../../.././public/css/index.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @if (Route::has('login'))
            <div>
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" >Register</a>
                @endif
            </div>
        @endif
        <h1 >Smart Shopper's</h1>
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