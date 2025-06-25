<div id="loginDiv">
    <form action="/login" method="POST">
        @csrf
        <input type="number" name="employeeId" placeholder="Medewerker Nummer" min="1"><br>
        <input type="password" name="password" placeholder="Wachtwoord"><br>
        <input type="submit" value="inloggen"><br>
    </form>
</div>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class='errorMessage'>{{ $error }}</div>
    @endforeach
@endif
