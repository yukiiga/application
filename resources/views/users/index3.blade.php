<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/index3.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        <p class='login'>{{ Auth::user()->name }}</p>
        <h2>Myチラシ一覧</h2>
        <div class='shops'>
            @foreach ($flyers as $flyer)
                <div class='shop'>
                    <img src="{{ $flyer->image_url }}" alt="画像が読み込めません。"/>
                    <h4>期間</h4>
                    <p>{{ $flyer->from_period }}～{{ $flyer->to_period }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $flyers->links() }}
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