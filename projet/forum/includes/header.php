<?php session_start (); ?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
    <div id="img-header"><img src="img/logo.png" alt="logo" width="150" height="150"></div>
       <div id="banniere"><img src="img/banniere.png" alt="banniere" width="100%" height="150"></div>
	<div id="nav-header">
		<nav>
			<ul>
				<li><a href="Index.php">Index</a></li>
				<li><a href="membre.php">Liste Membre</a></li>
				<li><a href="search.php">Recherche</a></li>
				<?php if(isset ($_SESSION ['connecte']))
				{
				?>
				<li><a href="moncompte.php">Mon Compte</a></li>
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
$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
	if(isset($_SESSION['id_u']) && !empty($_SESSION['id_u']) && is_numeric($_SESSION['id_u'])){
		$idu=$_SESSION['id_u'];
		$sth = $bdd->prepare("UPDATE FORUM.USERS SET lastAction=NOW() WHERE id_u=:idu");
		$sth->bindParam(':idu', $idu);
		$sth->execute();
	}
?>