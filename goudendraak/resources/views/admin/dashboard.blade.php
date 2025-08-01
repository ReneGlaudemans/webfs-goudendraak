<!DOCTYPE html>
<html>

<head>
    <title>GoudenDraak Admin</title>
</head>

<body>
    @auth
        @include('./admin/main')
    @else
        @include('./kassa/login')
    @endauth
</body>

</html>