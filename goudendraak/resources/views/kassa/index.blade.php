<!DOCTYPE html>
<html>

<head>
    <title>GoodPay Kassa</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/offer.css') }}">
    <link rel='stylesheet' type='text/css' href='{{ asset('css/header.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/login.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/general.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/cashDesk.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/menu.css') }}'>
    <link rel='stylesheet' type='text/css' href='{{ asset('css/sales.css') }}'>
    <script src="{{ asset('js/header.js') }}" defer></script>
    <script src="{{ asset('js/sales.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/cashDesk.js') }}" defer></script>
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