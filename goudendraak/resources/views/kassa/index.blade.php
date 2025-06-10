<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GoodPay Kassa</title>
    </head>

    <body>
        {{-- Header always shown --}}
        @include('./kassa/requires.header')

        {{-- Show login or main content based on authentication --}}
        @auth
            @include('./kassa/main')
        @else
            @include('./kassa/login')
        @endauth
    </body>
</html>