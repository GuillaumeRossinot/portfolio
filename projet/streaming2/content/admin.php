<?php
	if(!isset($_SESSION['connecte']) || $_SESSION['lvl'] !=3){
		
		header( "Refresh:5; url=index.php", true, 303);
		die("vous n'êtes pas autorisé !");
		
	}
?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
				<h2>Administration</h2>
					<h3>Administration film :</h3>
					<table>
						  <tr>
							   <th>Titre du film</th>
							   <th>description :</th>
							   <th>Modifier :</th>
							   <th>Supprimer :</th>
						   </tr>
					<?php
					$sqlFilm = "SELECT id_f,titre_f,desc_f FROM film";
					foreach ($bdd->query($sqlFilm) as $film) {
								  echo'<tr>
									   <td>'.$film['titre_f'].'</td>
									   <td >'.$film['desc_f'].'</td>
									   <td ><a href="index.php?p=viewsvideo&id_v='.$film['id_f'].'&type_v=1" >modifier</a></td>
									   <td ><a href="index.php?p=supprimerfilm&id_f='.$film['id_f'].'" >supprimer</a></td>
									   </tr>';
					}
					?>
					</table>
					<h3>Administration serie :</h3>
					<table>
								  <tr>
									   <th>Titre de la série :</th>
									   <th>description :</th>
									   <th>Modifier :</th>
									   <th>Supprimer :</th>
								   </tr>
					<?php
					
					$sqlserie = "SELECT id_se,titre_se,desc_se FROM serie";
					foreach ($bdd->query($sqlserie) as $serie) {
								  echo'<tr>
									   <td>'.$serie['titre_se'].'</td>
									   <td >'.$serie['desc_se'].'</td>
									   	<td ><a href="index.php?p=viewsvideo&id_v='.$serie['id_se'].'&type_v=2" >modifier</a></td>
									   <td ><a href="index.php?p=supprimerserie&id_se='.$serie['id_se'].'" >supprimer</a></td>
									   </tr>';
					}
					
					
					?>
					</table>
					
					<h3>Administration Utilisateurs :</h3>
							<table>
								  <tr>
									   <th>pseudo :</th>
									   <th>nom :</th>
									   <th>prenom :</th>
									   <th>email :</th>
									   <th>Bannir</th>
									   	</tr>
					<?php
					
					$sqlusers = "SELECT id_u,pseudo,nom,prenom,email FROM users";
					foreach ($bdd->query($sqlusers) as $users) {
								  echo'
								   <tr>
										   <td>'.$users['id_u'].'</td>
										   <td>'.$users['pseudo'].'</td>
										   <td >'.$users['nom'].'</td>
										   <td >'.$users['prenom'].'</td>
										   <td >'.$users['email'].'</td>
											<td><a href="index.php?p=ban&id_u='.$users['id_u'].'" >bannir</a> </td>
									   </tr>';
					}
					
					
					?>
					</table>