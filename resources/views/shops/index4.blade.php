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
        <p class='login'>ログインユーザー:{{ Auth::user()->name }}</p>
        <h2>店舗一覧</h2>
        <div class='shops'>
            @foreach ($shops as $shop)
                <div class='shop'>
                    <h3 class='title'>
                        <a href="/mypage/shops/{{ $shop->id }}">{{ $shop->name }}</a>
                    </h3>
                    <p class='address'>{{ $shop->address }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $shops->links() }}
        </div>
        <a href='/mypage/shops/create'>create</a>
        <div class="back">[<a href="/mypage">back</a>]</div>
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