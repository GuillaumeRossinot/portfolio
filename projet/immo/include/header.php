<?php session_start (); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/style.css" />
		<link href="/css/zoombox.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body>
    <div id="img-header"><img src="image/logo.jpg" alt="logo" width="150" height="150"></div>
       <div id="banniere"><img src="image/banniere.jpg" alt="banniere" width="100%" height="150"></div>
	<div id="nav-header">
		<nav>
			<ul>
				<li><a href="Index.php">Index</a></li>
				<li><a href="search.php">Recherche de bien</a></li>
				<?php if(isset ($_SESSION ['connecte']))
				{
				?>
				<li><a href="moncompte.php">Mon Compte</a></li>
				<li><a href="ajout_bien.php">Ajouter bien</a></li>
						<li><a href="adminBiens.php">Admin Biens</a></li>
				<?php
					if(isset($_SESSION['lvl']) && $_SESSION['lvl'] == 1){
						?>
						<li><a href="adminUser.php">Admin User</a></li>
						<li><a href="adminAdr.php">Admin Adresses</a></li>
						<?php
					}
				?>
				<li><a href="logout.php">Logout</a></li>
				<?php
				}
				else
				{
				?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Inscription</a></li>
				<?php
				}
				?>
			</ul>
		</nav>
        </div>
		<div style="clear: both;"></div>
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=immobi', 'root', '');
$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$bdd->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
$bdd->setAttribute( PDO::ATTR_PERSISTENT, true );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>