@extends('app')
@section('content')
    <table>
        <thead>
            <tr>
                <th scope="col">Nummer</th>
                <th scope="col">Naam</th>
                <th scope="col">Prijs</th>
                <th scope="col"><a href="/dishes/create"><button type="button">Create</button></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($dishes as $dish)
                <tr>
                    <td>{{$dish->id}}</td>
                    <td>{{$dish->name}}</td>
                    <td>€{{$dish->price}}</td>
                    <td><a href="/dishes/{{$dish->id}}"><button type="button">View</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection