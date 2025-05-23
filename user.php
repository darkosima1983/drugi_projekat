<?php
require_once "Models/Baza.php";
require_once "Models/Korisnik.php";

$user = new Korisnik;
$users = $user->view();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
$idUser = $_POST['delete_id'];
$user = new Korisnik($idUser);
$user->delete($idUser);
header("Location: user.php"); 
exit();
}

?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista proizvoda</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      padding: 40px;
    }

    h1, h2 {
      text-align: center;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      text-align: left;
    }

    th{
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    img {
      width: 60px;
      height: auto;
      border-radius: 5px;
    }

    td {
      vertical-align: middle;
    }

    .actions button {
      padding: 8px 12px;
      margin: 0 5px;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      font-size: 14px;
    }

    .btn-edit {
      background-color: #2196F3;
    }

    .btn-delete {
      background-color: #f44336;
    }

    .actions {
      white-space: nowrap;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>
<body>

  <h1>Lista korisnika</h1>
  <h2><a href="index.php">Lista proizvoda</a></h2>

  <table>
    <thead>
      <tr>
        <th>Email</th>
        <th>Sifra</th>
        <th>Akcije</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) :?>
      <tr>
        <td><?= $user['email'] ?></td>
        <td><?= $user['sifra'] ?></td>
        <td class="actions">
          <a href="userEdit.php?id=<?=$user['id']?>"><button class="btn-edit">Izmeni</button></a>
        
        <form method="POST" style="display:inline;" onsubmit="return confirm('Da li ste sigurni da želite da izbrišete ovaj proizvod?')">
            <input type="hidden" name="delete_id" value="<?= $user['id'] ?>">
            <button class="btn-delete" type="submit">Izbriši</button>
        </form>
          <?php endforeach;?>  
        </td>
      </tr>
    </tbody>
  </table>

</body>
</html>

