{{-- filepath: resources/views/kassa/cashDesk.blade.php --}}
<div id="cashDeskPage">
    <div id="cashDeskLeft">
        <div id="itemsToSelect">
            @foreach($categories as $category)
                <div class="menuItemType">{{ $category->name }}</div>
                <table class="itemToSelectTable">
                    <tbody>
                        @foreach($category->dishes as $dish)
                            <tr>
                                <td>
                                    {{ $dish->menunummer ?? '' }}{{ $dish->menu_toevoeging ?? '' }}.
                                </td>
                                <td>
                                    {{ $dish->name }}
                                    @if(!empty($dish->description))
                                        <i>({{ $dish->description }})</i>
                                    @endif
                                </td>
                                <td>
                                    € {{ number_format($dish->price, 2, ',', ' ') }}
                                </td>
                                <td>
                                    <button class="addMenuItem" value="{{ $dish->id }}">Toevoegen</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
    <div id="cashDeskRight">
        <div id="itemsSelectedContainer">
            <div id="itemsSelected">
                <div class='orderHeader'>Bestelling</div>
                <table class='itemSelectedTable'>
                    @foreach($categories as $category)
                        @foreach($category->dishes as $dish)
                            <tr class="hidden menuItem_{{ $dish->id }}" data-price="{{ $dish->price }}">
                                <td>
                                    {{ $dish->id ?? '' }}{{ $dish->description ?? '' }}.
                                </td>
                                <td>
                                    {{ $dish->name }}
                                    @if(!empty($dish->description))
                                        <i>({{ $dish->description }})</i>
                                    @endif
                                </td>
                                <td>
                                    <span>€ </span><span class="subAmount">{{ number_format($dish->price, 2, ',', ' ') }}</span>
                                </td>
                                <td>
                                    <input type="number" name="{{ $dish->id }}" min="0" value="0">
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
                            <button id="payOrder">Afrekenen</button>
                            <button id="clearOrder">Verwijderen</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>