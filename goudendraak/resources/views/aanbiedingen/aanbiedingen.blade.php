@extends('app')
@section('content')
    @if($offers->isEmpty())
        <div style="font-size:1.2em; margin:30px;text-align:center;text-color:yellow;">
            Er zijn momenteel geen aanbiedingen.
        </div>
    @else
        @foreach($offers as $offer)
            <div>
                <strong>{{ $offer->dish->name }}</strong> nu voor €{{ number_format($offer->new_price, 2, ',', '') }}
                <span>van {{ $offer->start_date }} t/m {{ $offer->end_date }}</span>
            </div>
        @endforeach
    @endif
@endsection