<?php
    include_once './session.php';
    include_once './database.php';

    if($_SESSION == null)
{
    echo'<script> window.location="index.php"; </script> ';
} 
    $id = $_POST['id'];
    $comment = $_POST['comment'];
    $ocena = $_POST['ocena'];
    $user = $_SESSION['user_id'];


    $sql = "INSERT INTO ocene (hifi_zvocniki_id, uporabnik_id, 	ocena, prednosti, slabosti) "
                                .  "VALUES ('$id','$user','$ocena','$comment', '$comment') ";
    mysqli_query($link, $sql);
    
    
    if($_SESSION['tip'] != 1)
            {
            header("Location: index.php");
            }
            else
            {
                header("Location: admin.php");
            }
?>