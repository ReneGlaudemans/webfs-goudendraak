{{-- filepath: resources/views/kassa/cashDesk.blade.php --}}
<div id="cashDeskPage">
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
                                <tr class="hidden menuItem_{{ $dish->id }}" data-price="{{ $dish->price }}">
                                    <td>
                                        {{ $dish->id ?? '' }}.
                                    </td>
                                    <td>
                                        {{ $dish->name }}
                                        @if(!empty($dish->description))
                                            <i>({{ $dish->description }})</i>
                                        @endif
                                    </td>
                                    <td>
                                        <span>€ </span><span
                                            class="subAmount">{{ number_format($dish->price, 2, ',', ' ') }}</span>
                                    </td>
                                    <td>
                                        <input type="number" name="amount" min="0" value="0">
                                    </td>
                                    <td><input type="text" name="remark" placeholder="Opmerking voor {{ $dish->name }}" /></td>
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
                                <button type="submit">Afrekenen</button>
                                <button class="clearOrder" type="reset">Verwijderen</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.addMenuItem = function (id) {
        var row = document.querySelector(".itemSelectedTable .menuItem_" + id);
        if (row) {
            row.classList.remove("hidden");
            row.classList.add("selected");
            var input = row.querySelector("input");
            var currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 1; // verhoog met 1
            row.querySelector(".subAmount").innerHTML = (parseFloat(row.dataset["price"]) * input.value).toFixed(2).replace(".", ",");
            window.updateTotal();
        }
    }
    window.updateTotal = function () {
        var selectedItems = document.querySelectorAll(".itemSelectedTable .selected .subAmount");
        var total = 0;
        for (var selectedIndex = 0; selectedIndex < selectedItems.length; selectedIndex++) {
            total += parseFloat(selectedItems[selectedIndex].innerHTML.replace(",", "."));
        }
        document.querySelector(".totalAmount").innerHTML = total.toFixed(2).replace(".", ",");
    }
    document.querySelector('form').addEventListener('reset', function () {
        // Alle menuItem-rijen verbergen en deselecteren
        document.querySelectorAll('.itemSelectedTable tr[class^="menuItem_"]').forEach(function (row) {
            row.classList.add('hidden');
            row.classList.remove('selected');
            row.querySelector("input").value = 0;
            if (row.querySelector(".subAmount")) {
                row.querySelector(".subAmount").innerHTML = parseFloat(row.dataset["price"]).toFixed(2).replace(".", ",");
            }
        });
        // Totaalbedrag resetten
        document.querySelector(".totalAmount").innerHTML = "0,00";
    });
</script>