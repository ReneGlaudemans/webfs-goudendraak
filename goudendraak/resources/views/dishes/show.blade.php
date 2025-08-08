@extends('admin.dashboard')
@section('admin-content')
  <div class="admin-show-container">
    <h2 class="admin-show-title">{{ $dish->name }}</h2>
    <p class="admin-show-subtitle">Gerecht details</p>
    <table class="admin-show-table">
    <tr>
      <th>Nummer</th>
      <td>{{ $dish->id }}</td>
    </tr>
    <tr>
      <th>Naam</th>
      <td>{{ $dish->name }}</td>
    </tr>
    <tr>
      <th>Beschrijving</th>
      <td>{{ $dish->description }}</td>
    </tr>
    <tr>
      <th>Prijs</th>
      <td>€{{ number_format($dish->price, 2, ',', '') }}</td>
    </tr>
    <tr>
      <th>Categorie</th>
      <td>{{ $category->name }}</td>
    </tr>
    </table>
    <div class="admin-show-actions">
    <a href="/dishes">
      <button type="button" class="admin-btn">Terug</button>
    </a>
    <a href="/dishes/{{ $dish->id }}/edit">
      <button type="button" class="admin-btn admin-btn-edit">Bewerk gerecht</button>
    </a>
    </div>
  </div>
@endsection