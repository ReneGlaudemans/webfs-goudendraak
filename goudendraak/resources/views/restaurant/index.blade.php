@extends('restaurant.tablet')
@section('tablet-content')
    @if(session('success'))
        <div class="successmessage">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-grid">

        @foreach($tables as $table)
            @php
                $customerCount = $table->customers ? $table->customers->count() : 0;
                $isFull = $customerCount >= 8;
            @endphp
            <div class="table-card">
                <a style="text-decoration:none; color:inherit;" href="{{ route('restaurant.show', $table->id) }}">
                    <div class="table-number">Tafel {{ $table->id }}</div>
                    <div class="table-status {{ $isFull ? 'occupied' : 'free' }}">
                        {{ $isFull ? 'Bezet' : 'Vrij' }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection