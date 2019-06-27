<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=sitestreaming', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

function isFilledField($champ){
return (isset($champ) && !empty($champ));
}

function LogOffIfBanned($bdd){
	if(isset($_SESSION['connecte']) && !empty($_SESSION['connecte'])){
		$requete = $bdd->query("SELECT count(*) FROM ip_ban WHERE id_u = '".$_SESSION['id_u']."' OR ip = '".$_SERVER['REMOTE_ADDR']."'");
		$reponse = $requete->fetch();
		if($reponse['count(*)'] > 0){
			session_unset();
		}
	}
	
}
?>