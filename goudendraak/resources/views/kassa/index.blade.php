<!DOCTYPE html>
<html>
    <head>
        <title>GoodPay Kassa</title>
        @vite('resources/js/app.js')
    </head>
    
    <body>
        @include('./kassa/header')
        
        @auth
            @include('./kassa/main')
        @else
            @include('./kassa/login')
        @endauth
    </body>
</html>