<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
</head>
<body>
  <h1>Podaj dane</h1>
  <form method="post" action="/formularz">
    @csrf <!-- {{ csrf_field() }} -->
    <input name="imie" type="text" placeholder="Imię" required>
    <input name="nazwisko" type="text" placeholder="Nazwisko" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="phone" type="text" placeholder="Telefon" required value="+48">
    <button>Zapisz</button>
  </form>
</body>
</html>