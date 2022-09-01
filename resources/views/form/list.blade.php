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
    <?php
      if(htmlspecialchars(@$_REQUEST['status'])=='user-already-exists') {
        ?>
          <div class="formError">
            <span class="title">Niespodzianka!</span>
            <span class="desc">Mamy już dane tego użytkownika, więc nie zapiszemy go ponownie!<br>Próbuj dalej i z łaski swojej nie zapełniaj nam miejsca informacjami, które już posiadamy 😡</span>
          </div>
        <?php
      }
    ?>

    <div class="formHeader">
      <span class="title">Lista osób</span>
      <span class="description">To, co widać poniżej, to lista wszystkich osób, które postanowiły oddać nam swoje dane.<br>Nie wyświetlamy hasła bo tak nie wolno!</span>
    </div>

    <?php
      if(!count($users)) {
        ?>
          <div class="emptyList">
            <span class="title">Coś jest nie tak 🤔</span>
            <span class="desc">
              Z jakiegoś powodu jeszcze nikt nie oddał nam swoich danych. Nie wiemy co może być tego przyczyną 😕.<br>
              Jeżeli chcesz oddać nam swoje informacje, przedjź <a href="{{ route('form') }}">pod ten adres</a> i wypełnij wszystkie pola.
            </span>
          </div>
        <?php
      }
      else {
        ?>
          <table class="usersList">
            <tr>
              <th>ID</th>
              <th>Nazwa użytkownika</th>
              <th>Imię</th>
              <th>Nazwisko</th>
              <th>Email</th>
              <th>Telefon</th>
            </tr>
            <?php
              foreach($users as $k => $v) {
                ?>
                  <tr>
                    <td><?=$v->id?></td>
                    <td><?=$v->login?></td>
                    <td><?=$v->imie?></td>
                    <td><?=$v->nazwisko?></td>
                    <td><?=$v->email?></td>
                    <td><?=$v->telefon?></td>
                  </tr>
                <?php
              }
            ?>
          </table>
        <?php
      }
    ?>

  </div>
</body>
</html>