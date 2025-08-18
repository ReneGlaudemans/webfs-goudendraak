@extends('app')
@section('content')
    <table class="info-table">
        <tr>
            <td class="side-cell"></td>
            <td align="center" class="info-cell">
                <h3>
                    @if($offers->isEmpty())
                        Er zijn momenteel geen aanbiedingen.
                    @else
                        Huidige aanbiedingen:<br><br>
                        @foreach($offers as $offer)
                            <div style="margin-bottom:18px;">
                                <strong>{{ $offer->dish->name }}</strong>
                                nu voor <span class="text-red">€{{ number_format($offer->new_price, 2, ',', '') }}</span>
                                <br>
                                <span style="font-size:0.95em; color:#666;">
                                    van {{ $offer->start_date }} t/m {{ $offer->end_date }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </h3>
            </td>
            <td class="side-cell"></td>
        </tr>
    </table>
@endsection