<?php require("include/header.php");
$formatter = new NumberFormatter('fr_FR',  NumberFormatter::CURRENCY);

if($_SESSION['connecte'] = true AND !empty($_SESSION['id_u'])){
		
	if(isset($_POST['submit']) AND !empty($_POST['submit']))
	{
		$id_u=htmlspecialchars($_SESSION['id_u']);
		$email=htmlspecialchars($_POST['email']);
		$login=htmlspecialchars($_POST['login']);

			$listExistingEmail=$bdd->query("SELECT EMAIL FROM USERS WHERE EMAIL='$email' AND ID_U <> $id_u");
			
			if($listExistingEmail->fetch()){
				die("email already exists !");
			}
			
		try
		{
			$bdd->beginTransaction();
			echo "<h3>updating values ...";
			$requete = $bdd->prepare("UPDATE USERS SET LOGIN=:login,EMAIL=:email WHERE ID_U=:uid");
			$requete->execute(array(
				'uid' => $id_u,
				'login' => $login,
				'email' => $email,
				)
			);

			if(isset($_POST['password_old']) AND !empty($_POST['password_old']) AND isset($_POST['password_new']) AND isset($_POST['password_new2'])){
				$old_mdp=sha1(htmlspecialchars($_POST['password_old']));
				$new_mdp=sha1(htmlspecialchars($_POST['password_new']));
				$new2_mdp=sha1(htmlspecialchars($_POST['password_new2']));
				
			/*echo "old : ".$old_mdp." SHA :".sha1($old_mdp);
			echo "new : ".$new_mdp." SHA :".sha1($new_mdp);
			echo "new_bis : ".$new2_mdp." SHA :".sha1($new2_mdp);*/
				//echo "SELECT 1 FROM USERS WHERE mdp='$old_mdp' AND ID_U=$id_u";
				$isPassOkRes=$bdd->query("SELECT 1 FROM USERS WHERE mdp='$old_mdp' AND ID_U=$id_u");
				
				if($isPassOkRes->fetch()){
					if($new_mdp == $new2_mdp){
						$requete = $bdd->prepare("UPDATE USERS SET MDP=:newmdp WHERE ID_U=:uid");
						$requete->execute(array(
							'uid' => $id_u,
							'newmdp' => $new_mdp,
							)
						);
					}
					else
						die("password mismatch !");
				}else
					die("incorrect password !");
			}else if(isset($_POST['password_old']) AND (!isset($_POST['password_new']) OR !isset($_POST['password_new2']) OR empty($_POST['password_new']) OR empty($_POST['password_new2']))){
				die("Merci de vérifier la saisie de mot de passe");
			}
			$bdd->commit();
			echo "done.</h3>";

		}
		catch (Exception $e)
		{
				$bdd->rollBack();
				echo '</h3>';
				die('Erreur : ' . $e->getMessage());
		}
		
	}
		echo "<form action=\"#\" method=\"post\">";
		
		$sth = $bdd->prepare('SELECT login, email, lvl FROM immobi.users WHERE id_u=:uid');
		$sth->bindParam(':uid', $_SESSION['id_u']);
		$sth->execute();

		$result = $sth->fetch(\PDO::FETCH_ASSOC);
		echo '<div id="moncompte">
				<h2> Modification du profil </h2>';
		echo "<label for=\"email\">login:</label>
		<input type=\"login\" name=\"login\" id=\"mylogin\" value=\""; echo $result['login'];
		echo "\" /><br />";
		echo "<label for=\"email\">Email:</label>
		<input type=\"email\" name=\"email\" id=\"myemail\" value=\""; echo $result['email'];
		echo "\" /><br />";
		echo "<label for=\"password_old\">OLD password:</label>
		<input type=\"password\" name=\"password_old\" id=\"password_old\" value=\"\" /><br />";
		echo "<label for=\"password_new\">NEW password:</label>
		<input type=\"password\" name=\"password_new\" id=\"password_new\" value=\"\" /><br />";
		echo "<label for=\"password_new2\">Repeat OLD password:</label>
		<input type=\"password\" name=\"password_new2\" id=\"password_new2\" value=\"\" /><br />";
        echo "<input type=\"submit\" name=\"submit\"/></form>";

    
    
        //afficher ses annonces
    
    
    	$sql = $bdd->prepare ("SELECT categorie.libelle as catlib, biens.id_b as id_b, biens.nb_pieces as nb_pieces, biens.prix as prix,
					biens.surface as surface,biens.date as date, biens.description as description, adresse.cp as cp, adresse.ville as ville,
                    biens.id_u as id_u
			FROM biens, adresse, categorie 
			WHERE biens.id_adr=adresse.id_adr 
			  and categorie.id_cat=biens.id_cat
			  and id_u=:uid");
		$sql->bindParam(':uid', $_SESSION['id_u']);
		$sql->execute();
              
        echo "<table border=1><th>preview</th><th>Type</th><th>Ville</th><th>surface (m²)</th><th>Nombre de pièces</th><th>Description</th><th>Date</th><th>Prix</th><th>action</th>";
		while($annonce = $sql->fetch()){
		echo "<tr>";
				$listFiles = glob('image/uploaded/'.$annonce->id_b."_*");
				$cpt=0;
				echo '<td>';
				foreach($listFiles as $thisimage){
					$cpt++;
					//
					echo "<a class=\"zoombox zgallery".$annonce->id_b."\" href=\"".$thisimage."\"><img style=\"".(($cpt>1)?"display:none;":"")."\" widht=50 height=50 src=\"".$thisimage."\" /></a>";
				}
				if($cpt == 0)
					echo "<a class=\"zoombox zgallery".$annonce->id_b."\" href=\"image/NO_PICTURE.jpg\"><img widht=50 height=50 src=\"image/NO_PICTURE.jpg\" /></a>";
				echo '</td>';
				echo '<td>'.$annonce->catlib.'</td>';
				echo '<td>'.$annonce->cp.' - '.$annonce->ville.'</td>';
				echo '<td>'.$annonce->surface.'</td>';
				echo '<td>'.$annonce->nb_pieces.'</td>';
				echo '<td>'.$annonce->description.'</td>';
				echo '<td>'.$annonce->date.'</td>';
				echo '<td>'.$formatter->formatCurrency($annonce->prix, 'EUR').'</td>';
				echo '<td style="text-align:center;"><a href="/deleteannonce.php?deleteannonceid='.$annonce->id_b.'" /> X </a></td>';
				echo '<tr />';
		}
    
    
    
       // if(isset($_GET['deleteannonceid']) && !empty($_GET['deleteannonceid']) && is_numeric($_GET['deleteannonceid'])){
		//		$annonceid = $_GET['deleteannonceid'];
		//		$uid = $_SESSION['id_u'];
		//		
		//		$sth = $bdd->prepare("DELETE FROM biens WHERE id_b=:annonceid AND id_u=:uid");
		//		$sth->bindParam(':annonceid', $annonceid);
		//		$sth->bindParam(':uid', $uid);
		//		$sth->execute();
		//		$result = $sth->rowCount();
		//		if($result > 0)
		//			echo "annonce ".$annonceid." supprimé avec succès";
		//		else
		//			echo "aucune annonce correspondant.";
		//		
		//		header( "refresh:5;url=/index.php");
		//		
		//	}
		//	else{
		//		echo "Merci de saisir une annonce ID valide.";
		//	}
            echo"</div>";
}
else{
	echo 'not connected';
}
?>