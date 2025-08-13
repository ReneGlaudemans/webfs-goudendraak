@extends('admin.dashboard')
@section('admin-content')
  <div class="admin-edit-container">
    <h2 class="admin-edit-title">Gerecht bewerken</h2>
    <form method="POST" action="/dishes/{{$dish->id}}" class="admin-edit-form">
    @method('PATCH')
    @csrf
    <table class="admin-edit-table">
      <tr>
      <th>Nummer</th>
      <td>
        <input type="text" name="id" id="id" value="{{$dish->id}}" class="admin-input" placeholder="17b">
        @error('id')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Naam</th>
      <td>
        <input type="text" name="name" id="name" value="{{$dish->name}}" class="admin-input" placeholder="nasi">
        @error('name')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Beschrijving</th>
      <td>
        <textarea id="description" name="description" rows="3" class="admin-input"
        placeholder="4p">{{$dish->description}}</textarea>
        @error('description')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Prijs</th>
      <td>
        <input type="number" step="0.01" min="1" name="price" id="price" value="{{$dish->price}}" class="admin-input"
        placeholder="6,00">
        @error('price')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Categorie</th>
      <td>
        <select id="category" name="category" class="admin-input">
        @foreach($categories as $categorie)
      <option value="{{$categorie->id}}" @if($dish->category_id == $categorie->id) selected @endif>
        {{$categorie->name}}
      </option>
      @endforeach
        </select>
        @error('category')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
    </table>
    <div class="admin-edit-actions">
      <a href="/dishes/{{$dish->id}}">
      <button type="button" class="admin-btn">Annuleren</button>
      </a>
      <button type="submit" class="admin-btn admin-btn-update">Opslaan</button>
      <button type="submit" form="delete-form" class="admin-btn admin-btn-delete">Verwijderen</button>
    </div>
    </form>
    <form id="delete-form" method="post" action="/dishes/{{$dish->id}}" class="hidden">
    @method('delete')
    @csrf
    </form>
  </div>
@endsection