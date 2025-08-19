<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        @page {
            size: 8.5cm 10cm;
            margin: 0;
        }

        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 13px;
            margin: 0;
            padding: 0;
            width: 8.5cm;
            height: 10cm;
            background: #fff;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 1px dashed #222;
            padding-bottom: 8px;
        }

        .receipt-logo {
            width: 60px;
            margin-bottom: 6px;
        }

        .receipt-title {
            font-size: 1.1em;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 2px;
        }

        .receipt-info {
            margin-bottom: 2px;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            padding: 20px;
        }

        .receipt-table th,
        .receipt-table td {
            border: none;
            padding: 2px 0;
            text-align: left;
        }

        .receipt-table th {
            font-size: 0.95em;
            font-weight: bold;
            border-bottom: 1px dashed #222;
        }

        .receipt-table td {
            font-size: 0.95em;
        }

        .receipt-table .right {
            text-align: right;
        }

        .receipt-table .center {
            text-align: center;
        }

        .total-row {
            border-top: 1px dashed #222;
        }

        .total-label {
            font-weight: bold;
            text-align: right;
            padding-top: 4px;
        }

        .total-value {
            font-weight: bold;
            text-align: right;
            padding-top: 4px;
        }

        .receipt-footer {
            text-align: center;
            font-size: 0.95em;
            margin-top: 12px;
            border-top: 1px dashed #222;
            padding-top: 8px;
        }
    </style>
</head>

<body>
    <div class="receipt-header">
        <img src="{{ public_path('img/dragon-small.png') }}" alt="De gouden draak" class="receipt-logo">
        <div class="receipt-title">DE GOUDEN DRAAK</div>
        <div class="receipt-info">Tafel: {{ $table->id }}</div>
        <div class="receipt-info">Datum: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</div>
    </div>

    <table class="receipt-table">
        <thead>
            <tr>
                <th>Gerecht</th>
                <th class="center">Aantal</th>
                <th class="right">Prijs</th>
                <th class="right">Totaal</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($orders as $order)
                @foreach($order->Order_Dish as $item)
                    <tr>
                        <td>{{ $item->dish->name }}</td>
                        <td class="center">{{ $item->quantity }}</td>
                        <td class="right">€{{ number_format($item->dish->price, 2) }}</td>
                        <td class="right">€{{ number_format($item->quantity * $item->dish->price, 2) }}</td>
                    </tr>
                    @php
                        $grandTotal += $item->quantity * $item->dish->price;
                    @endphp
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="3" class="total-label">Totaal</td>
                <td class="total-value">€{{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="receipt-footer">
        Bedankt voor uw bezoek!<br>
        De Gouden Draak - Chinees Specialiteiten Restaurant
    </div>
</body>

</html>