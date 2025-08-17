<div id="offerPage" class="hidden">
    <form method="POST" action="{{ route('offers.store') }}" class="offer-form-container">
        @csrf
        <div class="offer-form-title">Nieuwe aanbieding toevoegen</div>
        <table class="offer-form-table">
            <tr>
                <td class="offer-form-label">Gerecht</td>
                <td>
                    <select name="dish_id" class="offer-form-select">
                        @foreach($dishes as $dish)
                            <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="offer-form-label">Aanbiedingsprijs</td>
                <td>
                    <input type="number" step="0.01" name="new_price" placeholder="Aanbiedingsprijs"
                        class="offer-form-input">
                </td>
            </tr>
            <tr>
                <td class="offer-form-label">Startdatum</td>
                <td>
                    <input type="date" name="start_date" class="offer-form-input">
                </td>
            </tr>
            <tr>
                <td class="offer-form-label">Einddatum</td>
                <td>
                    <input type="date" name="end_date" class="offer-form-input">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="offer-form-btn">Opslaan</button>
                </td>
            </tr>
        </table>
    </form>
</div>