<?php
    include_once 'header.php';
?>

<h1>Registracija</h1>

<form action="user_add.php" method="post">
                                        Ime: <input type="text" name="ime" placeholder="Ime" required="required" />
                                        <br>
                                        Priimek: <input type="text" name="priimek" placeholder="Priimek" required="required" />
                                        <br>
                                        E-mail: <input type="email" name="email" placeholder="E-mail" required="required" />
                                        <br>
                                        Password: <input type="password" name="pass1" placeholder="Geslo" required="required" />
                                        <br>
                                        Confirm Password: <input type="password" name="pass2" placeholder="Ponovi geslo" required="required" />
                                        <br>
										<input type="submit" value="Register" />
									
								</form>
                                
<?php
    include_once 'footer.php';
?>
