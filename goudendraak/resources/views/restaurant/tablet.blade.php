<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/restaurant.css') }}">
</head>

<body>
    <div id="tabletView" style="display:none;">
        @yield('tablet-content')
    </div>
    <script>
        if (window.innerWidth >= 600 && window.innerWidth <= 1024) {
            document.getElementById('tabletView').style.display = 'block';
        }
    </script>
</body>

</html>