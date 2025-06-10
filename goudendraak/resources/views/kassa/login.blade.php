<div id="loginDiv">
    <form action="{{route('guest.login')}}" method="POST">
        @csrf
        <input type="number" name="employeeNr" placeholder="Medewerker Nummer" min="1"><br>
        <input type="password" name="password" placeholder="Wachtwoord"><br>
        <button type="submit">inloggen</button><br>
    </form>
</div>

@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif