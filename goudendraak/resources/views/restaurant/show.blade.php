@extends('restaurant.tablet')
@section('tablet-content')
    <div class="customer-table-container">
        <table class="customer-table w-full text-sm text-left text-gray-700">
            <thead class="customer-table-head">
                <tr>
                    <th scope="col" class="customer-table-th">Leeftijd</th>
                    <th scope="col" class="customer-table-th">Deluxe</th>
                    <th scope="col" class="customer-table-th">
                        <a href="/customers/create" class="no-link-style">
                            <button class="btn btn-add" type="button">Toevoegen</button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr class="customer-table-row">
                        <td class="customer-table-td">{{$customer->age}}</td>
                        <td class="customer-table-td">{{$customer->deluxe ? 'Yes' : 'No'}}</td>
                        <td class="customer-table-td">
                            <form action="/customers/{{$customer->id}}" method="post" class="inline-form">
                                @csrf
                                @method('delete')
                                <button class="btn btn-remove" type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="customer-table-actions">
            <a href="/receipt/{{$table->id}}/pdf" class="no-link-style">
                <button type="submit" class="btn btn-print">
                    Print bon
                </button>
            </a>
        </div>
    </div>
@endsection