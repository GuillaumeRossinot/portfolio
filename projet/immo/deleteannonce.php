<?php require("include/header.php");?>
       

	<?php
			if(isset($_GET['deleteannonceid']) && !empty($_GET['deleteannonceid']) && is_numeric($_GET['deleteannonceid'])){
				$annonceid = $_GET['deleteannonceid'];
				$uid = $_SESSION['id_u'];
				
				$sth = $bdd->prepare("DELETE FROM biens WHERE id_b=:annonceid AND id_u=:uid");
				$sth->bindParam(':annonceid', $annonceid);
				$sth->bindParam(':uid', $uid);
				$sth->execute();
				$result = $sth->rowCount();
				if($result > 0)
					echo "annonce ".$annonceid." supprimé avec succès";
				else
					echo "aucune annonce correspondant.";
				
				header( "refresh:5;url=/index.php");
				
			}
			else{
				echo "Merci de saisir une annonce ID valide.";
			}
	?>
	

<?php require("include/footer.php"); 
?>