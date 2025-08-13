@extends('admin.dashboard')
@section('admin-content')
  <div class="admin-create-container">
    <h2 class="admin-create-title">Nieuw gerecht</h2>
    <form method="post" action="/dishes" class="admin-create-form">
    @csrf
    <table class="admin-create-table">
      <tr>
      <th>Nummer</th>
      <td>
        <input type="text" name="id" id="id" value="{{ old('id') }}" class="admin-input" placeholder="17b">
        @error('id')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Naam</th>
      <td>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="admin-input" placeholder="nasi">
        @error('name')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Beschrijving</th>
      <td>
        <textarea id="description" name="description" rows="3" class="admin-input"
        placeholder="4p">{{ old('description') }}</textarea>
        @error('description')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
      <tr>
      <th>Prijs</th>
      <td>
        <input type="number" step="0.01" min="1" name="price" id="price" value="{{ old('price') }}"
        class="admin-input" placeholder="6,00">
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
      <option value="{{$categorie->id}}" @if(old('category') == $categorie->id) selected @endif>{{$categorie->name}}
      </option>
      @endforeach
        </select>
        @error('category')
      <p class="admin-error">{{$message}}</p>
      @enderror
      </td>
      </tr>
    </table>
    <div class="admin-create-actions">
      <a href="/dishes">
      <button type="button" class="admin-btn">Annuleren</button>
      </a>
      <button type="submit" class="admin-btn admin-btn-create">Opslaan</button>
    </div>
    </form>
  </div>
@endsection