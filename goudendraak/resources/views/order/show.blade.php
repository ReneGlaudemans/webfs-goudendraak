@extends('app')

@section('content')

@if (session('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
    <span class="font-medium">Success alert!</span> {{ session('success') }}
</div>
@endif

@if (count($order) > 0)
<table style="width:100%">
    <thead class="text-gray-700 bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">Gerecht</th>
            <th scope="col" class="px-6 py-3">Aantal</th>
            <th scope="col" class="px-6 py-3">Prijs</th>
            <th scope="col" class="px-6 py-3"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order as $item)
        <tr class="bg-white border-b  hover:bg-gray-50">
            <td class="px-6 py-4">{{ $item['name'] }}</td>
            <td class="px-6 py-4">
                <form action="{{ route('order.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">

                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    {{-- <input type="text" name="remark" value="{{ $item['remark'] ?? '' }}" placeholder="Add a remark (optional)"> --}}

                    <button type="submit" class="text-white bg-yellow-700 focus:ring-4 hover:bg-yellow-500 rounded-lg px-5 py-2.5 me-2 mb-2">Updaten</button>

                </form>
            </td>

            <td class="px-6 py-4">€ {{ number_format($item['price'], 2) }}</td>
            <td class="px-6 py-4">
                <form action="{{ route('order.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                    <button type="submit" class="text-white bg-red-700 focus:ring-4 hover:bg-red-500 rounded-lg px-5 py-2.5 me-2 mb-2">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-right">
    <h4>Totaal: € {{ number_format(collect($order)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</h4>
</div>
<div class="flex justify-end mt-6">
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Naam:</label>
        <input type="text" id="name" name="name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Bestellen
        </button>
    </form>
</div>
@else
<p>Je hebt nog geen gerechten toegevoegd.</p>
@endif
@endsection