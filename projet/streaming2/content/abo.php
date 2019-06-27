<?php
		try
		{
			$bdd = new PDO("mysql:host=localhost;dbname=sitestreaming","root","");
		}
		catch(Exception $e)
		{
			die("bdd non trouve");
		}
		
		$timestamp = time();
		$fin = $timestamp + (86400);
		/*$requete = $bdd->query("INSERT INTO abonnement(date_deb,date_fin,type,id_u) VALUES(($timestamp),($fin),1,1)");*/
		
		$requete = $bdd->query("SELECT date_fin FROM abonnement WHERE id_u = 1");
		$reponse = $requete->fetch();
		
		$temps_restant = $reponse['date_fin'] - time();
		echo date("H:i:s",$temps_restant);

?>