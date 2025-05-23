<?php
require_once "Baza.php";

class Product extends Baza
{
   
    public function view ()
    {
       
        $result = $this->sql -> query ("SELECT *  FROM proizvodi");
        if ($result-> num_rows == 0)
            {
                die ("Ovaj proizvod ne postoji");
            }
        
        return $result -> fetch_all(MYSQLI_ASSOC); 

    }
   
    public function __construct($idProduct  = null)

    {
        parent::__construct();
        $this->idProduct = $idProduct;
        
    }
    public function details()
    {
       
        $result = $this->sql -> query ("SELECT * FROM proizvodi WHERE id = $this->idProduct");
        if ($result-> num_rows == 0)
           {
               die ("Ovaj proizvod ne postoji");
           }

           return $result -> fetch_assoc();
    }
    public function delete ($idProduct)
    {
       
        $this->sql->query("DELETE FROM proizvodi WHERE id = '$idProduct'");
    }
    public function update ($idProduct, $newName, $newOpis, $newCena, $newSlika, $newKolicina)
    {
        $newName = $this->sql->real_escape_string ($newName);
        $newOpis = $this->sql->real_escape_string ($newOpis);
        $newCena = $this->sql->real_escape_string ($newCena);
        $newSlika = $this->sql->real_escape_string ($newSlika);
        $newKolicina = $this->sql->real_escape_string ($newKolicina);
        $this->sql->query("UPDATE proizvodi SET ime = '$newName', opis = '$newOpis', cena = '$newCena', slika = '$newSlika', kolicina = '$newKolicina'   WHERE id = '$idProduct'");
    }
}