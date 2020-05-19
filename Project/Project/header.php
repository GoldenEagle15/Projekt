<?php    
	include_once 'session.php';

?>

<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>PFilmi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Nav -->
				<nav id="nav">
					<ul>
						<?php
							echo '<li><a href="index.php">Home</a></li>';
						?>
						<?php
						if($_SESSION == NULL)
						{
                        echo '<li><a href="login.php">login</a></li>';
						echo '<li><a href="registracija.php">Registracija</a></li>';
						}
						else
						{
							echo '<li><a href="logout.php">logout</a></li>';
						}
                        ?>
					</ul>
				</nav>

			<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-12">