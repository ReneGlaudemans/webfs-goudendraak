@extends('app')
@section('content')
    <div>
        <div>
            <h1>Dankjewel voor het bestellen!</h1>
            <div>
                {!! $qrCode !!}
            </div>
            <p>Scan deze QR code voor details van de bestelling.</p>
        </div>
    </div>
@endsection