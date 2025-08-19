@extends('restaurant.tablet')
@section('tablet-content')
    @if(session('success'))
        <div class="successmessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-grid">

        @foreach($tables as $table)
            <div class="table-card">
                <a style="text-decoration:none; color:inherit;" href="{{ route('restaurant.show', $table->id) }}">
                    <div class="table-number">Tafel {{ $table->id }}</div>
                    <div class="table-status {{ $table->occupied ? 'occupied' : 'free' }}">
                        {{ $table->occupied ? 'Bezet' : 'Vrij' }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection