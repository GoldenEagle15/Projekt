<?php

    include_once './session.php';
    include_once './database.php';

    $item_id=(int) $_GET['id'];


    if ($_SESSION != NULL)
    {
       
    }
    else
    {
        header("Location: index.php");
    }


    $query = "DELETE FROM hifi_zvocniki WHERE id = '$item_id'";
    mysqli_query($link, $query);

    header("location:index.php");

?>