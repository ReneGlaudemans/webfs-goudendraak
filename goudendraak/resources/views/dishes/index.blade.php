@extends('admin.dashboard')
@section('admin-content')
    @if(session('success'))
        <div class="successmessage">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="errormessage">
            <ul style="list-style:none; margin:0; padding:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="admin-table">
        <thead>
            <tr>
                <th scope="col">Nummer</th>
                <th scope="col">Naam</th>
                <th scope="col">Prijs</th>
                <th scope="col"><a href="/dishes/create"><button class="admin-btn admin-btn-create"
                            type="button">Toevoegen</button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($dishes as $dish)
                <tr>
                    <td>{{$dish->id}}</td>
                    <td>{{$dish->name}}</td>
                    <td>€{{$dish->price}}</td>
                    <td><a href="/dishes/{{$dish->id}}"><button class="admin-btn" type="button">Bekijk</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection