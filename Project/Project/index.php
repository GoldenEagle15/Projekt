<?php
    include_once 'header.php';
    include_once 'database.php';

    if(isset($_SESSION['tip']))
    {
        if($_SESSION['tip'] != NULL)
        {
            header("Location: admin.php");
        }
        else
        {
            
        }
    }



?>

<h1 align="middle">Planko Filmi</h1>

<div align="middle">
<?php

    $query = "SELECT hf.id, hf.ime, hf.slika FROM hifi_zvocniki hf";
    $result = mysqli_query($link, $query);





    while($row = mysqli_fetch_array($result))
        {
            $query1 = 'SELECT ROUND(SUM(o.ocena)/COUNT(o.id), 2) FROM ocene o INNER JOIN hifi_zvocniki hf ON o.hifi_zvocniki_id=hf.id WHERE o.hifi_zvocniki_id = "'.$row['id'].'" LIMIT 3';
            $result1 = mysqli_query($link, $query1);

            $row2 = mysqli_fetch_array($result1);

            echo $row['ime'];
            echo '<br>';
            echo '<a href="item.php?id='.$row['id'].'">';
            echo '<img src=';
            echo $row['slika'];
            echo " width='300' height='450' alt='No image...'>";
            echo '</a>';
            echo '<br>';
            if( $row2 != NULL)
            {
            echo 'Ocena: ';
            echo $row2['ROUND(SUM(o.ocena)/COUNT(o.id), 2)'];
            }
            else
            {
                echo 'Ni se ocene.';
            }

            echo '<br>';
            echo '<br>';
            echo '<br>';
        }

?>
</div>
<?php
    include_once 'footer.php';
?>