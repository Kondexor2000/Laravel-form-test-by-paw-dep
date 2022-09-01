<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

  <title>Lista osób, które oddały nam swoje dane</title>
</head>

<body>
  <div class="pageContent">
    @if(htmlspecialchars(@$_REQUEST['status'])=='user-already-exists')
      <div class="formStatusContainer error">
        <span class="title">Niespodzianka!</span>
        <span class="desc">Mamy już dane tego użytkownika, więc nie zapiszemy go ponownie!<br>Próbuj dalej i z łaski swojej nie zapełniaj nam miejsca informacjami, które już posiadamy 😡</span>
      </div>
    @elseif(htmlspecialchars(@$_REQUEST['status'])=='success')
      <div class="formStatusContainer success">
        <span class="title">Jesteś super 😎</span>
        <span class="desc">
          Dzięki tobie zdobywamy coraz więcej danych o innych. Pamiętaj, że nic nie stoi na przeszkodzie, aby oddać nam jeszcze więcej informacji.<br>
          <a href="{{ route('form.show') }}">Kliknij tutaj, aby oddać nam za darmo jeszcze więcej informacji</a>
        </span>
      </div>      
    @endif

    <div class="formHeader">
      <span class="title">Lista osób</span>
      <span class="description">
        To, co widać poniżej, to lista wszystkich osób, które postanowiły oddać nam swoje dane.<br>
        Nie wyświetlamy hasła bo tak nie wolno!<br>
        Jeżeli chcesz oddać jeszcze więcej danych w nasze ręce, przejdź <a href="{{ route('form.show') }}">pod ten adres</a>.
      </span>
    </div>

    @if(!count($users)))
      <div class="emptyList">
        <span class="title">Coś jest nie tak 🤔</span>
        <span class="desc">
          Z jakiegoś powodu jeszcze nikt nie oddał nam swoich danych. Nie wiemy co może być tego przyczyną 😕.<br>
          Jeżeli chcesz oddać nam swoje informacje, przejdź <a href="{{ route('form.show') }}">pod ten adres</a> i wypełnij wszystkie pola.
        </span>
      </div>
    @else
      <table class="usersList">
        <tr>
          <th>ID</th>
          <th>Nazwa użytkownika</th>
          <th>Imię</th>
          <th>Nazwisko</th>
          <th>Email</th>
          <th>Telefon</th>
        </tr>
        @foreach($users as $key => $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->login }}</td>
            <td>{{ $user->imie }}</td>
            <td>{{ $user->nazwisko }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->telefon }}</td>
          </tr>
        @endforeach
      </table>
    @endif
  </div>
</body>
</html>