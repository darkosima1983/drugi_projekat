<?php
require_once "Models/Baza.php";
require_once "Models/Korisnik.php";
$idUser = $_POST['id'] ?? $_GET['id'] ?? null;

if (!$idUser) {
    die("Niste prosledili ID proizvoda.");
}
$user = new Korisnik ($idUser);
$data = $user->details();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {        
$newEmail = $_POST['email'];      
$newPassword = $_POST['sifra'];    
$user->update($idUser, $newEmail, $newPassword);
header("Location: user.php");
exit();
}

?>

<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Izmena proizvoda</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      padding: 40px;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    button {
      padding: 12px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #555;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h1>Izmeni proizvod</h1>

  <form method = "post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label for="ime">Korisnicko ime:</label>
    <input type="text" id="ime" name="email" value="<?= $data['email'] ?>">

    <label for="opis">Lozinka:</label>
    <input type="text" id="opis" name="sifra" value="<?= $data['sifra'] ?>">

    <button type="submit">Sačuvaj izmene</button>
  </form>

  <a href="user.php" class="back-link">← Povratak na listu korisnika</a>

</body>
</html>
