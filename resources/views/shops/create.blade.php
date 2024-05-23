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
        <h2>店舗一覧</h2>
        <div class='shops'>
            @foreach ($shops as $shop)
                <div class='shop'>
                    <h3 class='title'>
                        <a href="/shops/{{ $shop->id }}">{{ $shop->name }}</a>
                    </h3>
                    <!--<h3 class='title'>{{ $shop->name }}</h3>-->
                    <!--<p class='image_url'>{{ $shop->image_url }}</p>-->
                    <p class='address'>{{ $shop->address }}</p>
                    <!--<p class='open'>{{ $shop->open }}</p>-->
                    <!--<p class='close'>{{ $shop->close }}</p>-->
                    <!--<p class='tel'>{{ $shop->tel }}</p>-->
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $shops->links() }}
        </div>
    </body>
</html>