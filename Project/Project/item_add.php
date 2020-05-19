<?php
    include_once 'header.php';
    include_once 'database.php';
?>
<h1>Dodaj film</h1>
<form action="item_insert.php" method="post" enctype="multipart/form-data">
    <label>Ime</label>
    <input type="text" name="ime" />
    <br>
    <label>Dolzina</label>
    <input type="text" name="cena" />
    <br>
    <label>Opis</label>
    <textarea name="comment" rows="10" cols="30"></textarea>
    <br>
    <label>Slika</label>
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
    <br>
    <br>
<input type="submit" value="Dodaj" />
</form>


<?php
    include_once 'footer.php';
?>