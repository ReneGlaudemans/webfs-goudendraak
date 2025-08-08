@extends('admin.dashboard')
@section('admin-content')
  <div class="admin-show-container">
    <h2 class="admin-show-title">{{ $category->name }}</h2>
    <p class="admin-show-subtitle">Categorie details</p>
    <table class="admin-show-table">
    <tr>
      <th>Naam</th>
      <td>{{ $category->name }}</td>
    </tr>
    </table>
    <div class="admin-show-actions">
    <a href="/categories">
      <button type="button" class="admin-btn">Terug</button>
    </a>
    <a href="/categories/{{ $category->id }}/edit">
      <button type="button" class="admin-btn admin-btn-edit">Bewerk categorie</button>
    </a>
    </div>
  </div>
@endsection