<div id="offerPage" class="hidden">
    <form method="POST" action="{{ route('offers.store') }}"
        style="padding:32px 24px; max-width:500px; margin:30px auto; border:2px solid rgb(0,102,255)">
        @csrf
        <div style="font-size:1.3em; font-weight:bold; color:rgb(0,102,255); margin-bottom:18px; ">
            Nieuwe aanbieding toevoegen
        </div>
        <table style="width:100%; border-collapse:separate; border-spacing:0 12px;">
            <tr>
                <td style="width:40%; font-weight:bold;">Gerecht</td>
                <td>
                    <select name="dish_id"
                        style="width:100%; padding:8px; border-radius:6px; border:1px solid rgb(0,102,255);">
                        @foreach($dishes as $dish)
                            <option value="{{ $dish->id }}">{{ $dish->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold;">Aanbiedingsprijs</td>
                <td>
                    <input type="number" step="0.01" name="new_price" placeholder="Aanbiedingsprijs"
                        style="width:100%; padding:8px; border-radius:6px; border:1px solid rgb(0,102,255);">
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold;">Startdatum</td>
                <td>
                    <input type="date" name="start_date"
                        style="width:100%; padding:8px; border-radius:6px; border:1px solid rgb(0,102,255);">
                </td>
            </tr>
            <tr>
                <td style="font-weight:bold;">Einddatum</td>
                <td>
                    <input type="date" name="end_date"
                        style="width:100%; padding:8px; border-radius:6px; border:1px solid rgb(0,102,255);">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit"
                        style="background:rgb(0,102,255); color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1em; font-weight:bold; cursor:pointer;">
                        Opslaan
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>