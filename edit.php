<?php
require_once "Models/Baza.php";
require_once "Models/Product.php";
$idProduct = $_POST['id'] ?? $_GET['id'] ?? null;

if (!$idProduct) {
    die("Niste prosledili ID proizvoda.");
}
$product = new Product ($idProduct);
$data = $product->details();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {        
$newName = $_POST['ime'];      
$newOpis = $_POST['opis'];    
$newCena = $_POST['cena'];     
$newSlika = $_POST['slika'];   
$newKolicina = $_POST['kolicina']; 
$product->update($idProduct, $newName, $newOpis, $newCena, $newSlika, $newKolicina);
header("Location: index.php");
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
    <label for="ime">Ime proizvoda:</label>
    <input type="text" id="ime" name="ime" value="<?= $data['ime'] ?>">

    <label for="opis">Opis:</label>
    <input type="text" id="opis" name="opis" value="<?= $data['opis'] ?>">

    <label for="cena">Cena (€):</label>
    <input type="number" id="cena" name="cena" step="0.01" value="<?= $data['cena'] ?>">

    <label for="slika">URL slike:</label>
    <input type="text" id="slika" name="slika" value="<?= $data['slika'] ?>">

    <label for="kolicina">Količina:</label>
    <input type="number" id="kolicina" name="kolicina" value="<?= $data['kolicina'] ?>">

    <button type="submit">Sačuvaj izmene</button>
  </form>

  <a href="index.php" class="back-link">← Povratak na listu proizvoda</a>

</body>
</html>
