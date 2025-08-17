@extends('app')
@section('content')
    <div>
        @foreach($tables as $table)
            <a href="/table/{{$table->id}}">
                <div>
                    <p>Table {{$table->id}}</p>
                    <p>Seats: 8</p>
                    <p>Status: Free</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection