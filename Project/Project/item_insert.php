<?php
    include_once './session.php';
    include_once './database.php';

    if($_SESSION == null)
{
    echo'<script> window.location="index.php"; </script> ';
} 
    $ime = mysqli_real_escape_string($link, $_POST['ime']);
    $comment = mysqli_real_escape_string($link, $_POST['comment']);
    $cena = mysqli_real_escape_string($link, $_POST['cena']);


    if($_FILES['fileToUpload'] != NULL)
    {
        $target_dir = "uploads/";
        $target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;

    }
}
        // Check if file already exists
            if (file_exists($target_file1)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;

            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 2500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;

            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;

            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file1)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                $sql = "INSERT INTO hifi_zvocniki (id, ime, opis, cene, slika) "
                .  "VALUES ('','$ime', '$comment','$cena','$target_file1') ";
                mysqli_query($link, $sql);

                }
                else {
                    echo "Sorry, there was an error uploading your file.";
    }
}
    }
 
    if($_SESSION['tip'] != 1)
            {
            header("Location: index.php");
            }
            else
            {
                header("Location: admin.php");
            }
 
?>