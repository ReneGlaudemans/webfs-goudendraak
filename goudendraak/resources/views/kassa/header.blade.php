<div id='menuBar'>
    <img id="logo" src="{{asset('img/goodpay.png')}}" alt="goodpay logo">

    <div id='buttonBar'>
        @auth
            <button id='cashDeskBtn' class='menuButton'>
                Kassa
            </button>
            <button id='menuBtn' class='menuButton'>
                Gerechten
            </button>
            <button id='salesBtn' class='menuButton'>
                Verkoop Overzicht
            </button>
            <button id='offerBtn' class='menuButton'>
                Aanbiedingen
            </button>
            <a class='menuLink' href='/logout'>
                <div class='menuButton'>
                    Log Uit
                </div>
            </a>
        @endauth
    </div>
</div>