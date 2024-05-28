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
        <h2 class='title'>{{ $shop->name }}のチラシ</h2>
        <div class="content">
            <div class="content__shop">
                <div>
                    <img src="{{ $flyer->image_url }}" alt="画像が読み込めません。"/>
                </div>
                <h4>期間</h4>
                <p>{{ $flyer->from_period }}～{{ $flyer->to_period }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/mypage">戻る</a>
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