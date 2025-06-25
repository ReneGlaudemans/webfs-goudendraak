@extends('app')
@section('content')
<div class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Dankjewel voor het bestellen!</h1>
        <div class="mb-4">
            {!! $qrCode !!}
        </div>
        <p class="text-sm text-gray-600">Scan deze QR code voor details van de bestelling.</p>
    </div>
</div>
@endsection