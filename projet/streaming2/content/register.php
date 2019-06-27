
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
				<?php  
						$EnvoyerDonnee="";
						
					if(isset($_POST['EnvoyerDonnee']))
					{
						$Mdp = sha1($_POST['Mdp']);
						$Email = $_POST['Email'];
						$Nom = $_POST['Nom'];
						$Prenom = $_POST['Prenom'];
						$Pseudo = $_POST['Pseudo'];
						$EnvoyerDonnee = $_POST['EnvoyerDonnee'];
						
						//echo "INSERT INTO users (login,mdp,email,lvl) VALUES ('".$login."','".$mdp."','".$email."','".$level."')"; //test requete sql
							$sql = "SELECT 1 FROM users WHERE pseudo='$Pseudo' or email='$Email'";
								$exist = false;
								foreach ($bdd->query($sql) as $row) {
									$exist = true;
								}
						
						if (!$exist){
								if (isFilledField($Nom) && isFilledField($Prenom) && isFilledField($Email) && isFilledField($Mdp) && isFilledField($Pseudo))
								 {
									 $requete = $bdd ->query("INSERT INTO users (email,mdp,nom,prenom,pseudo) VALUES ('$Email','$Mdp','$Nom','$Prenom','$Pseudo')");
									 //$id_u=$bdd->lastInsertId();
									 //$requete = $bdd->query("INSERT INTO abonnement(date_deb,date_fin,type,id_u) VALUES(($timestamp),($fin),1,($id_u))");
								 echo "Merci de vous être inscrit, " , $Prenom , " " , $Nom ;
								 }
							}
						else{
							echo "Le compte existe déjà.";
							};
						//header("Location:login.php");
  
  					}
					
				?>
  <form method="post" action="index.php?p=register">
  
  <h2>Inscription :</h2>

    <!-- Gestion du nom : -->
    <?php
        if ((!isset($Nom) || empty($Nom)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le Nom DOIT être rempli :</font><BR>";

    echo "Votre nom : <input type=\"text\" name=\"Nom\" value=\"";
    if(!isset($Nom) && !empty($Nom))
        echo $Nom;
		echo "\"/><br>";
?>
	<!-- Gestion du Prénom : -->
    <?php
      if ((!isset($Prenom)|| empty($Prenom)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le prénom DOIT être rempli :</font><BR>";

    echo "Votre prénom : <input type=\"text\" name=\"Prenom\" value=\"";
		if(!isset($Prenom) && !empty($Prenom))
			echo $Prenom; 
			echo "\"/> <br> ";
    ?>
    <!-- Gestion du pseudo : -->
    <?php
      if ((!isset($Pseudo)|| empty($Pseudo)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le pseudo DOIT être rempli :</font><BR>";

    echo "Votre Pseudo : <input type=\"text\" name=\"Pseudo\" value=\"";
		if(!isset($Pseudo) && !empty($Pseudo))
			echo $Pseudo; 
			echo "\"/> <br>";
    ?>	
	<!-- Gestion de l'E-Mail : -->
    <?php
      if ((!isset($Email)|| empty($Email)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> L'E-Mail DOIT être rempli :</font><BR>";

    echo "Votre E-Mail : <input type=\"text\" name=\"Email\" value=\"";
		if(!isset($Email) && !empty($Email))
			echo $Email; 
			echo "\"/> <br>";
    ?>	
	<!-- Gestion du mdp : -->
    <?php
      if ((!isset($Mdp)|| empty($Mdp)) && ($EnvoyerDonnee <> ""))
        echo "<font color='#FF0000'> Le mot de passe DOIT être rempli :</font><BR>";

    echo "Votre mot de passe : <input type=\"password\" name=\"Mdp\" value=\"\"/> <br>";
    ?>
    <input type="submit" name="EnvoyerDonnee" value="Envoyer"/>
  </form>
		<div class="clearfix"> </div>