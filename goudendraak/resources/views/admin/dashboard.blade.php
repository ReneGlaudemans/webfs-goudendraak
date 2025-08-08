<!DOCTYPE html>
<html>

<head>
    <title>GoudenDraak Admin</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
</head>

<body>
    <div class="admin-header">
        <h1>GoudenDraak Admin Panel</h1>
    </div>
    <div class="admin-nav">
        <a href="/admin">Dashboard</a>
        <a href="/dishes">Gerechten</a>
        <a href="/categories">Categorieën</a>
        <a
            href="{{ route('kassa.index', ['begindate' => \Carbon\Carbon::today()->format('Y-m-d'), 'enddate' => \Carbon\Carbon::today()->format('Y-m-d')]) }}">
            Verkoopoverzicht
        </a>
        <a href="/logout">Uitloggen</a>
    </div>
    <div class="admin-content">
        @yield('admin-content')
    </div>
</body>

</html>