@extends('app')
@section('content')
<style>
* {
    box-sizing: border-box;
}

nav{
    float: left;
    width: 30%;
    background: #9e0a0a;
    padding: 20px;
}
nav ul {
  list-style-type: none;
  padding: 0;
  text-align: left;
}
article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #9e0a0a;
}
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
.cart {
    position:relative;
    float:right;
    width: 50px;
    height:50px;
}
.gerecht{
    /* text-align: left; */
    display: flex;
    width:100%
}
</style>

<section>
    <nav> 
        <ul>
        @foreach($categories as $category)
            <li><a style="color:yellow;font-size:30px" href="#{{$category->name}}">{{$category->name}}</a></li>
        @endforeach
        </ul>
    </nav>
    <article>
        <div>
            <div class="cart">
                <a href="/order">
                    <img class="cart" src="{{ asset('img/cart.png') }}" alt="The Golden Dragon">
                </a>
            </div>
                @if (session('success'))
                    <div>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif
                <div>
                @foreach($categories as $category)
                    <div id="{{ $category->name }}">
                    <h2 style="text-align:center;color:yellow;font-size:30px">{{ $category->name }}</h2>
                    <table style="width:100%">
                    @foreach($category->dishes as $dish)
                        <tr>
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
                            <input type="number" name="quantity" value="1" min="1" >
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
    </article>
</section>
@endsection