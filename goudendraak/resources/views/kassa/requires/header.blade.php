<!-- THIS IS A PARTIAL. No <HTML> tags needed -->
<link rel='stylesheet' type='text/css' href='css/header.css'>
<link rel='stylesheet' type='text/css' href='css/login.css'>
<link rel='stylesheet' type='text/css' href='css/general.css'>
<link rel='stylesheet' type='text/css' href='css/cashDesk.css'>
<link rel='stylesheet' type='text/css' href='css/menu.css'>
<link rel='stylesheet' type='text/css' href='css/sales.css'>

<script src="js/cashDesk.js" defer></script>
<script src="js/header.js" defer></script>
<script src="js/sales.js" defer></script>
<script src="js/main.js" defer></script>

<div id='menuBar'>
    <img id="logo" src="{{asset('./img/goodpay.png')}}" alt="goodpay logo">

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
            <form action={{route('logout')}} method="POST" >
                @csrf
                    <button type='submit' class='menuButton'>
                    Log Uit
                </button>
            </form>
           
       @endauth
    </div>
</div>