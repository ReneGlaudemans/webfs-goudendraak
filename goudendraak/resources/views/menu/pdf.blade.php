<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>De Gouden Draak Menu</title>
</head>
<style>
    * {
        background: #f9f7e3;
    }

    .menu-container {
        column-count: 3;
        gap: 32px;
    }

    .menu-category {
        break-inside: avoid;
        margin-bottom: 32px;
    }

    .menu-category-title {
        font-size: 1.3em;
        font-weight: bold;
        color: #c00;
        margin-bottom: 12px;
    }

    .menu-dish {
        margin-bottom: 12px;
    }

    .menu-dish-name {
        font-weight: bold;
    }

    .menu-dish-desc {
        font-size: 0.98em;
        color: #666;
        font-style: italic;
    }

    .menu-dish-price {
        font-weight: bold;
        color: #222;
    }
</style>

<body>
    <div class="menu-container">
        @foreach($categories as $category)
            <div class="menu-category">
                <div class="menu-category-title">{{ $category->name }}</div>
                @foreach($category->dishes as $dish)
                    <div class="menu-dish">
                        <span class="menu-dish-name">{{ $dish->name }}</span>
                        @if($dish->description)
                            <span class="menu-dish-desc"> - {{ $dish->description }}</span>
                        @endif
                        <span class="menu-dish-price"> (€{{ number_format($dish->price, 2, ',', '') }})</span>
                    </div>
                @endforeach
            </div>
        @endforeach
        @php
            $now = now();
            $validOffers = collect();
            foreach ($categories as $category) {
                foreach ($category->dishes as $dish) {
                    foreach ($dish->offers as $offer) {
                        if ($offer->start_date <= $now && $offer->end_date >= $now) {
                            $validOffers->push($offer);
                        }
                    }
                }
            }
        @endphp
        @if($validOffers->count())
            <div class="menu-category" style="margin-top:48px;">
                <div class="menu-category-title">Aanbiedingen</div>
                @foreach($validOffers as $offer)
                    <div class="menu-dish">
                        <span class="menu-dish-name">{{ $offer->dish->name }}</span>
                        @if($offer->dish->description)
                            <span class="menu-dish-desc"> - {{ $offer->dish->description }}</span>
                        @endif
                        <span class="menu-dish-price" style="color:#c00;">
                            (€{{ number_format($offer->new_price, 2, ',', '') }})
                        </span>
                        <span style="text-decoration:line-through; color:#888; margin-left:6px;">
                            €{{ number_format($offer->dish->price, 2, ',', '') }}
                        </span>
                        <span style="margin-left:8px; color:#444;">
                            ({{ $offer->start_date }} t/m {{ $offer->end_date }})
                        </span>
                    </div>
                @endforeach
            </div>
        @endif
        <div style=" padding:40px 0; margin-top:48px; text-align:center;">
            <span
                style="background:#339933; color:#fff; font-weight:bold; font-size:2em; padding:6px 24px; border-radius:4px; display:inline-block;">
                AFHAALLIJST
            </span>
            <div style="font-size:1.5em; margin-bottom:18px;">Chinees Specialiteiten Restaurant</div>
            <div style="font-size:1.2em; margin-bottom:24px;">
                <strong>Openingstijden</strong><br>
                ma. t/m do: 15.30 - 21.00 uur<br>
                vr t/m zo: 12.00 - 21.30 uur
            </div>
            <div style="margin-bottom:18px;">
                Mogelijkheid tot telefonisch bestellen<br>
                Ruime parkeergelegenheid<br>
                Catering orientaalse stijl<br>
                Airconditioned<br>
                Bezorgen € 2.00 extra
            </div>
            <div style="margin-bottom:18px; font-weight:bold;">
                HEEFT U OOK IETS TE VIEREN?<br>
                <span style="font-weight:normal;">
                    Wij zorgen voor een uitgebreid warm buffet.<br>
                    zowel aan huis als op locatie.<br>
                    Wij nemen uw zorgen uit handen en u kunt zich focussen op uw gasten.
                </span>
            </div>
            <div style="margin-bottom:18px;">
                Heeft u een <span style="font-weight:bold;">Allergie?</span><br>
                <span style="font-size:0.95em;">
                    Meld het ons<br>
                    onze producten kunnen kruisbesmetting bevatten
                </span>
            </div>
        </div>
</body>

</html>