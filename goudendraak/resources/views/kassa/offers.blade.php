<div id="offerPage" class="hidden">
    <form method="POST" action="{{ route('offers.store') }}">
        @csrf
        <select name="dish_id">
            @foreach($dishes as $dish)
                <option value="{{ $dish->id }}">{{ $dish->name }}</option>
            @endforeach
        </select>
        <input type="number" step="0.01" name="new_price" placeholder="Aanbiedingsprijs">
        <input type="date" name="start_date">
        <input type="date" name="end_date">
        <button type="submit">Opslaan</button>
    </form>
</div>