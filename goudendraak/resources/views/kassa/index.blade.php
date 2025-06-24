<!DOCTYPE html>
<html>
    <head>
        <title>GoodPay Kassa</title>
    </head>

    <body>
        @include('kassa.header')
        @auth
            @include('kassa.main')
        @endauth
        @guest
            @include('kassa.login')
        @endguest
    </body>
</html>