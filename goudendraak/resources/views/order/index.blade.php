@extends('app')
@section('content')
   <style>
      body {
        background: #f2f2f2;
        font-family: 'Roboto', Arial, sans-serif;
        margin: 0;
        padding: 0;
      }

      .terminal-wrapper {
        max-width: 1200px;
        margin: 40px auto;
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        padding: 40px 32px;
        display: flex;
        gap: 40px;
      }

      .sidebar {
        width: 320px;
        background: #ffe600;
        border-radius: 18px;
        padding: 32px 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
      }

      .sidebar-logo {
        width: 120px;
        margin-bottom: 24px;
      }

      .sidebar-title {
        font-size: 2em;
        font-weight: bold;
        color: #d1111b;
        margin-bottom: 18px;
        text-align: center;
        letter-spacing: 2px;
      }

      .sidebar-info {
        font-size: 1.1em;
        color: #333;
        margin-bottom: 18px;
        text-align: center;
      }

      .menu-main {
        flex: 1;
        padding-left: 24px;
      }

      .menu-section {
        margin-bottom: 36px;
      }

      .section-title {
        font-size: 1.5em;
        color: #d1111b;
        font-weight: bold;
        margin-bottom: 18px;
        border-bottom: 2px solid #ffe600;
        padding-bottom: 6px;
        letter-spacing: 1px;
      }

      .menu-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
      }

      .menu-item {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        padding: 18px 14px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: box-shadow 0.2s;
      }

      .menu-item:hover {
        box-shadow: 0 4px 16px rgba(209, 17, 27, 0.15);
        border: 2px solid #ffe600;
      }

      .item-name {
        font-size: 1.15em;
        font-weight: bold;
        color: #222;
        margin-bottom: 8px;
        text-align: center;
      }

      .item-desc {
        font-size: 0.98em;
        color: #666;
        font-style: italic;
        margin-bottom: 8px;
        text-align: center;
      }

      .item-price {
        font-size: 1.1em;
        color: #d1111b;
        font-weight: bold;
        margin-bottom: 12px;
      }

      .order-btn {
        background: #d1111b;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 24px;
        font-size: 1em;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s;
      }

      .order-btn:hover {
        background: #a80c15;
      }

      @media (max-width: 900px) {
        .terminal-wrapper {
          flex-direction: column;
          padding: 20px 8px;
        }

        .sidebar {
          width: 100%;
          margin-bottom: 24px;
        }

        .menu-main {
          padding-left: 0;
        }

        .menu-grid {
          grid-template-columns: 1fr;
        }
      }
   </style>

   <div class="terminal-wrapper">
      <div class="sidebar">
        <img src="{{ asset('img/golden-dragon-logo.png') }}" alt="Logo" class="sidebar-logo">
        <div class="sidebar-title">Bestel hier!</div>
        <div class="sidebar-info">
          Welkom bij De Gouden Draak.<br>
          Kies uw gerechten en voeg ze toe aan uw bestelling.<br>
          <span style="color:#d1111b; font-weight:bold;">Snelle service, direct afhalen!</span>
        </div>
      </div>
      <div class="menu-main">
        @foreach($categories as $category)
         <div class="menu-section">
           <div class="section-title">{{ $category->name }}</div>
           <div class="menu-grid">
            @foreach($category->dishes as $dish)
            <div class="menu-item">
               <div class="item-name">{{ $dish->name }}</div>
               @if($dish->description)
               <div class="item-desc">{{ $dish->description }}</div>
            @endif
               <div class="item-price">€{{ number_format($dish->price, 2, ',', '') }}</div>
               <button class="order-btn">Toevoegen</button>
            </div>
           @endforeach
           </div>
         </div>
       @endforeach
      </div>
   @endsection