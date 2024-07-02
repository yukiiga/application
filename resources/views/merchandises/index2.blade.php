<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Smart Shopper's</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/index2.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>Smart Shopper's</h1>
        <div class='login'>{{ Auth::user()->name }}</div>
        <h2>買い物リスト</h2>
        <div class='l'>
            <ul class='lists'>
                @foreach ($merchandises as $merchandise)
                    <li class='merchandise'>
                        <h3 class='name'>{{ $merchandise->name}} {{ $merchandise->price}}円</h4>
                        <a href="/mypage/shops/{{ $merchandise->shop->id }}">{{ $merchandise->shop->name}}</a>
                        <p class='day'>({{ $merchandise->day}})</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class='paginate'>
            {{ $merchandises->links() }}
        </div>
        <div class='links'>
            <a href='/mypage/shops/lists/create2' class='lists'>買い物リストを追加</a>
            <a href='/mypage/shops' class='index'>店舗一覧</a>
            <a href='/mypage/myflyers' class='flyers'>Myチラシ一覧</a>
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