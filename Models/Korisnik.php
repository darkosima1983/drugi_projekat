<?php
require_once "Baza.php";
class Korisnik extends Baza
{   
    public function register ($email, $password)
    {
        $email = $this->sql->real_escape_string ($email);
        $password = $this->sql->real_escape_string ($password);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $this->sql->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$password')");
    }


    public function provera ($email)
    {
        $email = $this->sql->real_escape_string ($email);
        $rezultat=$this->sql->query ("SELECT * FROM korisnici WHERE email = '$email'");

        if ($rezultat->num_rows > 0)
        {
            return true;
        }else
        {
           return false;
        }
        
    }
    public function __construct($idUser  = null)

    {
        parent::__construct();
        $this->idUser = $idUser;
        
    }
    public function delete ($idUser)
    {
        
        $this->sql->query("DELETE FROM korisnici WHERE id = '$idUser'");
    }
    public function update ($idUser, $newEmail, $newPassword)
    {
       
        $newEmail = $this->sql->real_escape_string ($newEmail);
        $newPassword = $this->sql->real_escape_string ($newPassword);
        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->sql->query("UPDATE korisnici SET email = '$newEmail', sifra = '$newPassword'  WHERE id = '$idUser'");
    }
    public function details()
    {
       
        $result = $this->sql -> query ("SELECT * FROM korisnici WHERE id = $this->idUser");
        if ($result-> num_rows == 0)
           {
               die ("Ovaj korisnik ne postoji");
           }

           return $result -> fetch_assoc();
    }
    public function view ()
    {
       
        $result = $this->sql -> query ("SELECT *  FROM korisnici");
        if ($result-> num_rows == 0)
            {
                die ("Ovaj korisnik ne postoji");
            }
        
        return $result -> fetch_all(MYSQLI_ASSOC); 

    }
}