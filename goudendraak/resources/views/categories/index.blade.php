@extends('admin.dashboard')
@section('admin-content')
    @if(session('success'))
        <div class="successmessage">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="errormessage">
            <ul style="list-style:none; margin:0; padding:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="admin-table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Naam</th>
                <th scope="col">
                    <a href="/categories/create">
                        <button type="button" class="admin-btn admin-btn-create">Toevoegen</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/categories/{{ $category->id }}">
                            <button type="button" class="admin-btn">Bekijk</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection