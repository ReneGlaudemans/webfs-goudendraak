<div id="loginDiv">
    <form action="/login" method="POST">
        @csrf
        <input type="number" name="employeeId" placeholder="Medewerker Nummer" min="1"><br>
        <input type="password" name="password" placeholder="Wachtwoord"><br>
        <input type="submit" value="inloggen"><br>
    </form>
</div>
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
@if($errors->any())
<div class='errorMessage'>{{$error->message}}</div>
@endif
