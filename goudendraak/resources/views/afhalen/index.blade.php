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
                        <table class="info-table">
                            @foreach($category->dishes as $dish)
                                @php
                                    $activeOffer = $dish->offers
                                        ->where('start_date', '<=', now())
                                        ->where('end_date', '>=', now())
                                        ->first();
                                    $price = $activeOffer ? $activeOffer->new_price : $dish->price;
                                @endphp
                                <tr class="dish-row">
                                    <td>{{$dish->id}}</td>
                                    <td>
                                        <p class="dish-name">{{ $dish->name }}.</p>
                                        <p class="dish-desc">{{ $dish->description }}</p>
                                    </td>
                                    <td>
                                        <p class="dish-price">
                                            € {{ number_format($price, 2) }}
                                            @if($activeOffer)
                                                <span style="text-decoration:line-through; color:#888; margin-left:6px;">
                                                    € {{ number_format($dish->price, 2) }}
                                                </span>
                                                <span class="text-yellow" style="font-weight:bold; margin-left:6px;">Aanbieding!</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <form action="{{route('order.add')}}" method="post" class="dish-form">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$dish->id}}">
                                            <input type="hidden" name="name" value="{{ $dish->name }}">
                                            <input type="hidden" name="price" value="{{ $price }}">
                                            <input type="number" name="quantity" value="1" min="1" class="dish-quantity">
                                            <button type="submit" class="dish-add-btn">Toevoegen</button>
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