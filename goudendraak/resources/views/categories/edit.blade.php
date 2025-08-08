@extends('admin.dashboard')
@section('admin-content')
  <div class="admin-edit-container">
    <h2 class="admin-edit-title">Categorie bewerken</h2>
    <form method="POST" action="/categories/{{$category->id}}" class="admin-edit-form">
    @method('PATCH')
    @csrf
    <table class="admin-edit-table">
      <tr>
      <th>Naam</th>
      <td>
        <input type="text" name="name" id="name" value="{{$category->name}}" class="admin-input"
        placeholder="Categorie naam">
        @error('name')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
    </table>
    <div class="admin-edit-actions">
      <a href="/categories/{{$category->id}}">
      <button type="button" class="admin-btn">Annuleren</button>
      </a>
      <button type="submit" class="admin-btn admin-btn-update">Opslaan</button>
      <button type="submit" form="delete-form" class="admin-btn admin-btn-delete">Verwijderen</button>
    </div>
    </form>
    <form id="delete-form" method="post" action="/categories/{{$category->id}}" class="hidden">
    @method('delete')
    @csrf
    </form>
  </div>
@endsection