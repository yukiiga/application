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
        <h2>買い物リスト</h2>
        <div class='lists'>
            @foreach ($merchandises as $merchandise)
                <div class='merchandise'>
                    <h4 class='name'>{{ $merchandise->name}}</h4>
                    <p class='merchandise'>{{ $merchandise->price}}円</p>
                    <a href="/mypage/shops/{{ $merchandise->shop->id }}">{{ $merchandise->shop->name}}</a>
                    <p class='day'>{{ $merchandise->day}}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $merchandises->links() }}
        </div>
        <a href='/mypage/shops/lists/create2'>買い物リストを追加</a>
        <a href='/mypage/shops'>店舗一覧</a>
        <a href='/mypage/myflyers'>Myチラシ一覧</a>
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