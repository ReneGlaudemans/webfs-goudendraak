<div id="salesPage" @if(request('begindate') || request('enddate')) @else class="hidden" @endif>
    <div id="salesTopLeft">
        <div id="selectDates">
            <div id="dateSelectors">
                <table class="dateSelect">
                    <form method="POST" {{route('sales.index')}}>
                        <tbody>
                            <tr>
                                <td>Begin datum:</td>
                                <td><input id="begindate" type="date" name="begindate"></input></td>
                                <td rowspan="2"><button id="datesSelectedBtn" type=submit>Maak Overzicht</button></td>
                            </tr>
                            <tr>
                                <td>End datum:</td>
                                <td><input id="enddate" type="date" name="enddate"></input></td>
                                <td></td>
                            </tr>
                        <tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <div id="salesTopRight">
        <div id="overviewInfo">
            <table>
                <tbody>
                    <tr>
                        <td><span>€ </span><span id="total">{{ number_format($total ?? 0, 2, ',', '') }}</span></td>
                        <td>BTW:</td>
                        <td><span>€ </span><span id="vat">{{ number_format($vat ?? 0, 2, ',', '') }}</span></td>
                        <td>excl. BTW:</td>
                        <td><span>€ </span><span
                                id="totalexvat">{{ number_format($totalExVat ?? 0, 2, ',', '') }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="salesBottom">
        <div id="salesResult">
            <table>
                <thead>
                    <tr>
                        <th>
                            Datum
                        </th>
                        <th>
                            Gerecht
                        </th>
                        <th>
                            Prijs
                        </th>
                        <th>
                            Aantal
                        </th>
                        <th>
                            Subtotaal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($overview ?? [] as $sale)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($sale['saleDate'])->format('d-m-Y') }}</td>
                            <td>{{ $sale['naam'] }}</td>
                            <td>€ {{ number_format($sale['price'], 2, ',', '') }}</td>
                            <td>{{ $sale['amount'] }}</td>
                            <td>€ {{ number_format($sale['subTotal'], 2, ',', '') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Geen verkoop op de aangegeven datum</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>