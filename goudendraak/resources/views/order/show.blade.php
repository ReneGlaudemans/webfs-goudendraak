@extends('app')

@section('content')

    @if(session('success'))
        <div class="successmessage">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="errormessage">
            <ul style="list-style:none; margin:0; padding:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (count($order) > 0)
        <table style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Gerecht</th>
                    <th scope="col">Aantal</th>
                    <th scope="col">Prijs</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <form action="{{ route('order.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">

                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit">Updaten</button>

                            </form>
                        </td>

                        <td>€ {{ number_format($item['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('order.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <h4>Totaal: € {{ number_format(collect($order)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</h4>
        </div>
        <div>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" required />
                <button type="submit">
                    Bestellen
                </button>
            </form>
        </div>
    @else
        <p>Je hebt nog geen gerechten toegevoegd.</p>
    @endif
@endsection