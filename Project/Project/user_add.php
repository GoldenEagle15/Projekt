<?php
include_once './database.php';

$first_name = $_POST['ime'];
$last_name = $_POST['priimek'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty($first_name) && !empty($last_name) && !empty($email)
        && !empty($pass1) && ($pass1==$pass2)) {
    //vse ok
    $pass = $salt.$pass1;
    $pass = sha1($pass);
    
    $query = "INSERT INTO uporabniki(ime, priimek, email, pass, tip) "
            . "VALUES ('$first_name','$last_name','$email','$pass', '0')";
    mysqli_query($link, $query);

header("Location: index.php");
    
}
else {
    //preusmeritev nazaj
    header("Location: registracija.php");
}


?>