<?php
    include_once 'header.php';
    include_once 'database.php';

    $item_id=(int) $_GET['id'];
?>

<head>
    <style>
        textarea 
        {
            resize: none;
        }
    </style>
</head>

<?php

if(isset($_SESSION['tip']))
    {
        if($_SESSION['tip'] != NULL)
        {
        ?>
        <div align="middle">
            <a class="button" href="item_edit.php?id=<?php echo "$item_id"; ?>">Uredi film</a>
        </div>
        <br>
        <div align="middle">
            <a class="button" href="item_del.php?id=<?php echo "$item_id"; ?>" onclick="return confirm('Si preprican?');">Izbrisi film</a>
        </div>
        <br>
        <br>

        <?php
    }

    }
?>

<?php

    $query = "SELECT hf.ime FROM hifi_zvocniki hf WHERE id = $item_id";
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result))
    {
        echo '<h1>';
        echo $row['ime'];
        echo '</h1>';
    }
?>

<?php

    $query = "SELECT hf.id, hf.opis, hf.ime, hf.slika FROM hifi_zvocniki hf WHERE hf.id = $item_id";
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result))
    {
        echo '<img src=';
        echo $row['slika'];
        echo " width='300' height='450' alt='No image...'>";
        echo '<br>';
        echo '<br>';
        echo $row['opis'];

        echo '<br>';
        echo '<br>';
    }
?>

<?php

    $query = "SELECT hf.cene FROM hifi_zvocniki hf WHERE hf.id = $item_id";
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result))
    {
        echo 'Film traja: ';
        echo $row['cene'];
        echo ' min.';
    }
?>
<br>
    <h2>Komentarji</h2>
<br>
<?php

    $query = "SELECT * FROM ocene o INNER JOIN hifi_zvocniki hf ON o.hifi_zvocniki_id=hf.id WHERE hf.id = $item_id";
    $result = mysqli_query($link, $query);

    while($row = mysqli_fetch_array($result))
    {
        echo '<br>';
        echo "<div style='border: thin solid black'>";
        echo "Ocena: ";
        echo $row['ocena'];
        echo '<br>';
        echo "Komentar: ";
        echo $row['prednosti'];
        echo '</div>';
    }
?>


<?php
    if ($_SESSION != NULL)
    {
        ?>
        <br>
            <form action="ocena_insert.php" method="post">
                <label>Komentar in Ocena</label>
                <select name="ocena">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <?php
                echo "<input type='hidden' name='id' value= $item_id>";
                ?>
                <textarea name="comment" rows="10" cols="30"></textarea>
                <br>
                <input type="submit" value="Oceni" />
            </form>

        <?php
    }
    else
    {
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<b>Hocete oceniti ta film? ';
        echo "<a href='login.php'>Prijavite se!</b></a>";
    }
?>

<?php
    include_once 'footer.php';
?>