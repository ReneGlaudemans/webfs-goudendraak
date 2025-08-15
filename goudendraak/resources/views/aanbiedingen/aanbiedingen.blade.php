@extends('app')
@section('content')
    <table width="100%">
        <tr style="padding-top:50px">
            <td colspan="3" height="50px"></td>
        </tr>
        <tr style="padding-top:50px">
            <td width="50px"></td>
            <td align="center" style="font-size:1.2em; border:1px solid #c00; background:floralwhite; padding:30px;">
                <h3>
                    @if($offers->isEmpty())
                        Er zijn momenteel geen aanbiedingen.
                    @else
                        Huidige aanbiedingen:<br><br>
                        @foreach($offers as $offer)
                            <div style="margin-bottom:18px;">
                                <strong>{{ $offer->dish->name }}</strong>
                                nu voor <span style="color:#c00;">€{{ number_format($offer->new_price, 2, ',', '') }}</span>
                                <br>
                                <span style="font-size:0.95em; color:#666;">
                                    van {{ $offer->start_date }} t/m {{ $offer->end_date }}
                                </span>
                            </div>
                        @endforeach
                    @endif
                </h3>
            </td>
            <td width="50px"></td>
        </tr>
    </table>
@endsection