@extends('admin.dashboard')
@section('admin-content')
  <div class="admin-create-container">
    <h2 class="admin-create-title">Nieuwe categorie</h2>
    <form method="post" action="/categories" class="admin-create-form">
    @csrf
    <table class="admin-create-table">
      <tr>
      <th>Naam</th>
      <td>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="admin-input"
        placeholder="Categorie naam">
        @error('name')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
    </table>
    <div class="admin-create-actions">
      <a href="/categories">
      <button type="button" class="admin-btn">Annuleren</button>
      </a>
      <button type="submit" class="admin-btn admin-btn-create">Opslaan</button>
    </div>
    </form>
  </div>
@endsection