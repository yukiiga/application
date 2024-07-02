<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <link rel="stylesheet" href="{{ asset('css/show3.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        <h2 class='name'>{{ $shop->name }}のチラシ</h2>
        <div class="content">
                <div>
                    <img class ="Image" src="{{ $flyer->image_url }}" alt="画像が読み込めません。"/>
                </div>
                <h4 class ="during">期間</h4>
                <p>{{ $flyer->from_period }}～{{ $flyer->to_period }}</p>
                <form action="/mypage/shops/{{ $shop->id }}/flyers/{{ $flyer->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Myチラシ登録">
                </form>
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