@extends('app')
@section('content')
    <div class="container">
        <div class="sidenav">
            @foreach($categories as $category)
                <a class="text-yellow" style="font-size:30px" href="#{{$category->name}}">{{$category->name}}</a>
            @endforeach
        </div>
        <div class="main">
            <div>
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
                <div class="cart">
                    <a href="/order">
                        <img class="cart" src="{{ asset('img/cart.png') }}" alt="The Golden Dragon">
                    </a>
                </div>
            </div>
            <div>
                @foreach($categories as $category)
                    <div id="{{ $category->name }}">
                        <h2 style="text-align:center;color:yellow;font-size:30px">{{ $category->name }}</h2>
                        <table style="width:100%">
                            @foreach($category->dishes as $dish)
                                <tr style="width:100%">
                                    <td>
                                        <h3>{{ $dish->name }}</h3>
                                    </td>
                                    <td>
                                        <p>€ {{ number_format($dish->price, 2) }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $dish->description }}</p>
                                    </td>
                                    <td>
                                        <form action="{{route('order.add')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$dish->id}}">
                                            <input type="hidden" name="name" value="{{ $dish->name }}">
                                            <input type="hidden" name="price" value="{{ $dish->price }}">
                                            <label for="quantity">Aantal</label>
                                            <input type="number" name="quantity" value="1" min="1">
                                            <button type="submit">Toevoegen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection