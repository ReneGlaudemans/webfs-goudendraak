<div id="cashDeskPage" @if(request('begindate') || request('enddate')) class="hidden" @endif>
    <div id="cashDeskLeft">
        <div id="itemsToSelect">
            <div id="app">
                <gerecht-filter :categories='@json($categories)'></gerecht-filter>
            </div>
        </div>
    </div>
    <div id="cashDeskRight">
        <div id="itemsSelectedContainer">
            <form method="POST" action="{{ route('kassa.pay') }}">
                @csrf
                <div id="itemsSelected">
                    <div class='orderHeader'>Bestelling</div>
                    <table class='itemSelectedTable'>
                        @foreach($categories as $category)
                            @foreach($category->dishes as $dish)
                                @php
                                    $activeOffer = $dish->offers
                                        ->where('start_date', '<=', now())
                                        ->where('end_date', '>=', now())
                                        ->first();
                                    $price = $activeOffer ? $activeOffer->new_price : $dish->price;
                                @endphp
                                <tr class="hidden menuItem_{{ $dish->id }}" data-price="{{ $price }}">
                                    <td>{{ $dish->id ?? '' }}.</td>
                                    <td>
                                        {{ $dish->name }}
                                        @if(!empty($dish->description))
                                            <i>({{ $dish->description }})</i>
                                        @endif
                                        @if($activeOffer)
                                            <span class="menuItem_aanbieding">Aanbieding!</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span>€ </span>
                                        <span class="subAmount">{{ number_format($price, 2, ',', ' ') }}</span>
                                        @if($activeOffer)
                                            <span class="oldPrice">
                                                €{{ number_format($dish->price, 2, ',', ' ') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="number" name="dishes[{{ $dish->id }}]" min="0" value="0">
                                    </td>
                                    <td>
                                        <input type="text" name="remarks[{{ $dish->id }}]"
                                            placeholder="Opmerking voor {{ $dish->name }}" />
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
                <div id="itemsSelectedTotal">
                    <table class='itemSelectedTotalTable'>
                        <tr>
                            <td></td>
                            <td>Totaal:</td>
                            <td>
                                <span>€ </span><span class="totalAmount">0,00</span>
                            </td>
                            <td>
                                <button id="payOrder" type="submit">Afrekenen</button>
                                <button id="clearOrder" type="reset">Verwijderen</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>