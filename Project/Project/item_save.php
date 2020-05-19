<?php
    include_once './session.php';
    include_once './database.php';

    if ($_SESSION != NULL)
    {
       
    }
    else
    {
        header("Location: index.php");
    }

    $item_id=(int) $_GET['id'];


    $ime = mysqli_real_escape_string($link, $_POST['ime']);
    $dolzina = mysqli_real_escape_string($link, $_POST['cena']);
    $opis = mysqli_real_escape_string($link,$_POST['comment']);


        $query = "UPDATE hifi_zvocniki SET ime = '$ime' WHERE (id = '$item_id')";
        $query1 = "UPDATE hifi_zvocniki SET cene = '$dolzina' WHERE (id = '$item_id')";
        $query2 = "UPDATE hifi_zvocniki SET opis = '$opis' WHERE (id = '$item_id')";
        mysqli_query($link, $query);
        mysqli_query($link, $query1);
        mysqli_query($link, $query2);

        header("location:index.php");

?>