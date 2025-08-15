<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menukaart - De Gouden Draak</title>
    <style>
        html,
        body {
            height: 100%;
            background: #f9f7e3 !important;
        }

        body {
            min-height: 100vh;
            background: #f9f7e3 !important;
            font-family: 'Times New Roman', Times, serif;
            color: #2d2d2d;
            margin: 0;
            padding: 0;
        }

        .menu-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            background: #f9f7e3;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            padding: 40px 32px;
            display: flex;
            gap: 40px;
        }

        .menu-left,
        .menu-right {
            flex: 1;
        }

        .menu-title {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            color: #c00;
            margin-bottom: 10px;
            font-family: 'Georgia', serif;
            letter-spacing: 2px;
        }

        .menu-logo {
            display: block;
            margin: 0 auto 20px auto;
            max-width: 320px;
        }

        .menu-section {
            margin-bottom: 36px;
        }

        .section-title {
            font-size: 1.3em;
            color: #c00;
            border-bottom: 2px solid #c00;
            padding-bottom: 6px;
            margin-bottom: 18px;
            font-family: 'Georgia', serif;
            letter-spacing: 1px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
            font-size: 1.05em;
        }

        .item-details {
            max-width: 75%;
        }

        .item-name {
            font-weight: bold;
            color: #2d2d2d;
        }

        .item-desc {
            font-size: 0.98em;
            color: #666;
            font-style: italic;
        }

        .item-price {
            font-family: 'Georgia', serif;
            font-size: 1.05em;
            color: #2d2d2d;
            font-weight: bold;
            min-width: 70px;
            text-align: right;
        }

        .menu-item:not(:last-child) {
            border-bottom: 1px dotted #c00;
            padding-bottom: 6px;
        }

        .menu-info {
            margin-top: 30px;
            font-size: 1em;
            color: #444;
            line-height: 1.6;
        }

        .menu-info-title {
            font-weight: bold;
            color: #c00;
            margin-bottom: 8px;
        }

        .menu-highlight {
            background: #e2c48d;
            color: #2d2d2d;
            padding: 8px 12px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 1.1em;
        }

        .menu-right .menu-info {
            margin-top: 0;
        }

        .menu-right {
            padding-left: 30px;
            border-left: 2px solid #e2c48d;
        }

        .menu-footer {
            margin-top: 40px;
            text-align: center;
            color: #888;
            font-size: 0.95em;
        }

        @media (max-width: 900px) {
            .menu-wrapper {
                flex-direction: column;
                padding: 20px 8px;
            }

            .menu-right {
                border-left: none;
                padding-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="menu-wrapper">
        <div class="menu-left">
            <img src="{{ asset('img/golden-dragon-logo.png') }}" alt="Golden Dragon Logo" class="menu-logo">
            <div class="menu-title">AFHAALLIJST</div>
            {{-- Example dishes loop --}}
            @foreach($categories as $category)
                <div class="menu-section">
                    <div class="section-title">{{ $category->name }}</div>
                    @foreach($category->dishes as $dish)
                        <div class="menu-item">
                            <div class="item-details">
                                <span class="item-name">{{ $dish->name }}</span>
                                @if($dish->description)
                                    <div class="item-desc">{{ $dish->description }}</div>
                                @endif
                            </div>
                            <div class="item-price">€{{ number_format($dish->price, 2, ',', '') }}</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="menu-right">
            <div class="menu-title" style="font-size:1.5em; margin-bottom:20px;">Chinees Specialiteiten Restaurant</div>
            <div class="menu-info">
                <div class="menu-info-title">Openingstijden</div>
                ma. t/m do: 15.30 - 21.00 uur<br>
                vr t/m zo: 12.00 - 21.00 uur
            </div>
            <div class="menu-info">
                <div class="menu-info-title">Bestellen & Service</div>
                Mogelijkheid tot telefonisch bestellen<br>
                Ruime parkeergelegenheid<br>
                Catering orientaalse stijl<br>
                Airconditioned<br>
                Bezorgen € 2.00 extra
            </div>
            <div class="menu-info menu-highlight">
                Heeft u ook iets te vieren?<br>
                Wij verzorgen een uitgebreid warm buffet.<br>
                Zowel aan huis als op locatie.<br>
                Wij nemen uw zorgen uit handen en u kunt zich focussen op uw gasten.
            </div>
            <div class="menu-info">
                <div class="menu-info-title">Allergie?</div>
                Meld het ons<br>
                Onze producten kunnen kruisbesmetting bevatten
            </div>
            <div class="menu-footer">
                &copy; {{ date('Y') }} De Gouden Draak - Alle rechten voorbehouden
            </div>
        </div>
    </div>
</body>

</html>