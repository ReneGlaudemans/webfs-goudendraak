@extends('restaurant.tablet')
@section('tablet-content')
    <div class="customer-create-container">
        <form method="post" action="/customers" class="customer-create-form">
            @csrf
            <div class="customer-form-section">
                <h2 class="customer-form-title">Nieuwe klant toevoegen</h2>
                @if($errors->any())
                    <div class="errormessage">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="customer-form-fields">
                    <div class="customer-form-group">
                        <label for="customerage" class="customer-form-label">Leeftijd</label>
                        <input type="number" min="1" name="customerage" id="customerage" class="customer-form-input">
                        @error('customerage')
                            <p class="customer-form-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="customer-form-group">
                        <label for="deluxe" class="customer-form-label">Deluxe</label>
                        <input type="checkbox" value="1" name="deluxe" id="deluxe" class="customer-form-checkbox">
                        @error('deluxe')
                            <p class="customer-form-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="customer-form-group">
                        <label for="table" class="customer-form-label">Tafel</label>
                        <select id="table" name="table" class="customer-form-select">
                            @foreach($tables as $table)
                                <option value="{{$table->id}}">{{$table->id}}</option>
                            @endforeach
                        </select>
                        @error('table')
                            <p class="customer-form-error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="customer-form-actions">
                <a href="/restaurant">
                    <button type="button" class="customer-btn customer-btn-cancel">Annuleren</button>
                </a>
                <button type="submit" class="customer-btn customer-btn-save">Opslaan</button>
            </div>
        </form>
    </div>
@endsection