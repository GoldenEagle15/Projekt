<?php
    include_once './database.php';
	include_once './session.php';
	

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
   if (!empty($email) && !empty($pass)) {
        //pripravimo geslo
        $pass = sha1($salt.$pass);
        $query = "SELECT * FROM uporabniki WHERE (email='$email') AND (pass='$pass');";
        $result = mysqli_query($link, $query);
		
		
      if (mysqli_num_rows($result) > 0) {
		  
		  //vse je ok - naredi prijavo
            //rezultat select stavka - shrani v array
            $user = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['tip'] = $user['tip'];
            $_SESSION['first_name'] = $user['ime'];
            $_SESSION['last_name'] = $user['priimek'];

            
            //preusmeritev na Home
            if($user['tip'] != 1)
            {
            header("Location: index.php");
            }
            else
            {
                header("Location: admin.php");
            }
        }
        else {
			
			//preusmeritev na login
            header("Location: login.php");
            
        }
    }
    else {
        //preusmeritev na login
        header("Location: login.php");
    }
?>