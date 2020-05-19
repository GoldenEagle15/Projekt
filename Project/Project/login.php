<?php
    include_once 'header.php';
?>

<h1>Login</h1>

<form action="login_check.php" method="post">
                                        E-Mail: <input type="email" name="email" placeholder="email" />
                                        <br>
                                        Password: <input type="password" name="pass" placeholder="Geslo" />
                                        <br>
										<input type="submit" value="Login">
                                </form>
                                
<?php
    include_once 'footer.php';
?>
