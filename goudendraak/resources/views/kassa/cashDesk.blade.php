<div id="cashDeskPage">
    <div id="cashDeskLeft">
        <div id="itemsToSelect">
            @foreach($menuItems as $index => $menuItem)
            
                @if(collect($menuItemsType)->contains($menuItem->soortgerecht))

                    <div class='menuItemType'>
                        {{$menuItem->soortgerecht}}
                    </div>

                    collect($menuItemsType) = collect($menuItemsType)->diff(collect([$menuItem->soortgerecht]));

                    <table class='itemToSelectTable'>
                    <tbody>
                
                @endif
                
                    <tr>
                        <td>
                            {{$menuItem->menunummer}}.{{$menuItem->menu_toevoeging}}.
                        </td>
                        <td>
                        @if($menuItem->beschrijving != null && $menuItem->beschrijving != "")
                            {{$menuItem->naam}}<i>({{$menuItem->beschrijving}})</i>
                        @else
                            {{$menuItem->naam}}
                        @endif
                        </td>

                        <td>
                            € {{ number_format($menuItem->price, 2, ',', ' ') }}
                        </td>

                        <td>
                            <button class='addMenuItem' value='{{$menuItem->id}}'>Toevoegen</button>
                        </td>
                    </tr>

                    @if((($index + 1) < sizeof($menuItems) && $menuItems[$index]->soortgerecht != $menuItems[$index + 1]->soortgerecht)|| (($index + 1) >= sizeof($menuItems)))
                        </tbody>
                        </table>
                    @endif
            @endforeach
             </tbody>
            </table>
        </div>
    </div>
    <div id="cashDeskRight">
        <div id="itemsSelectedContainer">
            <div id="itemsSelected">
                <div class='orderHeader'>Bestelling</div>

                <table class='itemSelectedTable'>
                    @foreach($menuItems as $menuItem)
                        <tr class="hidden menuItem_'{{$menuItem->id}}" data-price="{{$menuItem->price}}">
                            <td>
                                {{$menuItem->menunummer}}.{{$menuItem->menu_toevoeging}}
                            </td>

                            <td>
                                @if ($menuItem->beschrijving != null && $menuItem->beschrijving != "") 
                                    {{$menuItem->naam}}<i>{{$menuItem->beschrijving}}</i>
                                @else
                                    {{$menuItem->naam}}
                                @endif
                            </td>

                            <td>
                                <span>€</span>
                                <span class="subAmount">
                                    {{ number_format($menuItem->price, 2, ',', ' ') }}
                                </span>
                            </td>

                            <td>
                                <input type="number" name="{{ $menuItem->id }}" min="0" value="0">
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div id="itemsSelectedTotal">
                <table class='itemSelectedTotalTable'>
                    <tr>
                        <td>
                        </td>
                        <td>
                            Totaal:
                        </td>

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