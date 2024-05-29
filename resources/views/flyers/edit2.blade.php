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
        <h2 class='title'>{{ $shop->name }}</h2>
        <div class="content">
            <form action="/mypage/shops/{{ $shop->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="image">
                    <h2>チラシ</h2>
                    <input type="file" name="image_url" value="{{ $flyer->image_url }}">
                    <p class="title__error" style="color:red">{{ $errors->first('flyer.image_url') }}</p>
                </div>
                <div class="open">
                    <h2>期間</h2>
                    <input type="date" name="flyer[from_period]" value="{{ $flyer->from_period }}"/>~<input type="date" name="flyer[to_period]" value="{{ $flyer->to_period }}"/>
                    <p class="open__error" style="color:red">{{ $errors->first('flyer.from_period') }}</p>
                    <p class="close__error" style="color:red">{{ $errors->first('flyer.to_period') }}</p>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
        <div class="footer">
            <a href="/mypage/shops/{{ $shop->id }}">戻る</a>
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