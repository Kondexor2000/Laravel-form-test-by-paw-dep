<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
</head>
<body>
  <h1>Lista użytkowników</h1>
  <table border="1" cellspacing="0">
    <tr>
      <th>ID</th>
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
            <td><?=$v->imie?></td>
            <td><?=$v->nazwisko?></td>
            <td><?=$v->email?></td>
            <td><?=$v->telefon?></td>
          </tr>
        <?php
      }
    ?>
  </table>
</body>
</html>