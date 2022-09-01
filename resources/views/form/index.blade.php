<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  
  <title>Oddaj nam swoje dane</title>
</head>

<body>
  <div class="pageContent">

    <div class="formHeader">
      <span class="title">Oddaj nam swoje dane 🥰</span>
      <span class="description">W tym formularzu możesz pozostawić nam wszystkie informacje o tobie (lub o innych), których oczywiśnie nie użyjemy do niecnych celów (a przynajmniej hasła, bo zostanie zaszyfrowane, żeby nikt nie mógł go ukraść)</span>
    </div>

    <form method="post" action="{{ route('form.save') }}">
      @csrf <!-- {{ csrf_field() }} -->
      <div class="group">
        <div class="item">
          <span class="label">Nazwa użytkownika</span>
          <input autocomplete="username" name="login" type="text" required>
        </div>
        <div class="item">
          <span class="label">Hasło</span>
          <input autocomplete="new-password" name="password" type="password" required minlength="8">
        </div>
      </div>
      <div class="group">
        <div class="item">
          <span class="label">Imię</span>
          <input autocomplete="given-name" name="imie" type="text" required>
        </div>
        <div class="item">
          <span class="label">Nazwisko</span>
          <input autocomplete="family-name" name="nazwisko" type="text" required>
        </div>
      </div>
      <div class="group">
        <div class="item">
          <span class="label">Adres email</span>
          <input autocomplete="email" name="email" type="email" required>
        </div>
        <div class="item">
          <span class="label">Numer telefonu</span>
          <input autocomplete="tel" name="phone" type="text" required placeholder="+48">
        </div>
      </div>
      <div class="group cc">
        <div class="disabled">
          Nie no, jaja se robie, tych danych nie zapisujemy 😂
        </div>
        <div class="item">
          <span class="label">Numer karty kredytowej</span>
          <input type="text" disabled placeholder="XXXX XXXX XXXX XXXX">
        </div>
        <div class="item">
          <span class="label">Numer CVC</span>
          <input type="text" disabled placeholder="XXX">
        </div>
        <div class="item">
          <span class="label">Data ważności karty</span>
          <input type="text" disabled placeholder="MM/YY">
        </div>
      </div>
      <div class="buttons">
        <button>Zapisz</button>
      </div>
    </form>

  </div>
</body>
</html>