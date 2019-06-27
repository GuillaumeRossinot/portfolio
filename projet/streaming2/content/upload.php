  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
			<h2>Ajout de film/serie :</h2>
					<form action="#" method="post" enctype="multipart/form-data">
							<label>Titre :</label><input type="text" style="width: 20%;"name="titre" value="" /><br />
							<label>Description :</label><textarea name="description1"  rows=20 cols=200/></textarea><br />
							<label>Lien :</label><input type="text" style="width: 20%;"name="lien" value="" /> <br />
							<label>Genre :</label><select name="genre">
								<option value="1" >Action/Aventure</option>
								<option value="2" >Dramatique</option>
								<option value="3" >Animation</option>
								<option value="4" >Fantastique et science-fiction</option>
								<option value="5" >Historique</option>
								<option value="6" >Comédie</option>
								<option value="7" >Policières et thrillers</option>
							</select><br />
					<label>Année:</label><input type="text" style="width: 20%;"name="annee" value="0000" /><br />
				<label>pays :</label><input type="text" style="width: 20%;"name="pays" value="" /><br />
				<input type="file" name="files[]" multiple> Note: Supported image format: .jpeg, .jpg, .png, .gif <br />
				<label>Type :</label><select name="type">
					<option value="1" >Film</option>
					<option value="2">Série</option>
				</select><br />
				<input type="submit" name="submit"/>
					</form>
					
				<?php  
						
					if(isset($_POST['submit']))
					{
						$titre = htmlspecialchars( $_POST['titre']);
						$description = addslashes ($_POST['description1']);
						$lien = htmlspecialchars( $_POST['lien']);
						$genre = $_POST['genre'];
						$annee = $_POST['annee'];
						$pays = $_POST['pays'];
						$type = $_POST['type'];
						
						if(isset($_POST['type'])) {
								$type = ceil($_POST['type']);
							} 
							else {
								$type = 1;
							}
						
								$sql = "SELECT sum(tablecpt.cpt) as cptres FROM (SELECT count(*) as cpt FROM film f WHERE UPPER(f.titre_f) = UPPER('$titre') AND 1=$type UNION SELECT count(*) FROM serie s WHERE UPPER(s.titre_se) = UPPER('$titre') AND 2=$type) tablecpt";
								$exist = false;
																
								$res = $bdd->query($sql);
								$row=$res->fetch();
								
								//echo "res : " .$row['cptres'].'<br />';
								
								if($row['cptres'] > 0){
									$exist = true;
								}
								
								if(!$exist){
								
								 
									if($type == 1) {
									// Redirection site 1 
									$bdd ->exec("INSERT INTO film (titre_f,desc_f,lien_f,genre_f,annee,pays) VALUES ('$titre','$description','$lien','$genre','$annee','$pays')");
										//print_r($bdd->errorInfo());
									//echo "INSERT INTO film (titre_f,desc_f,lien_f,genre_f,annee,pays) VALUES ('$titre','$description','$lien','$genre','$annee','$pays')";
									$idimage=$bdd->lastInsertId();
										echo "Merci de votre ajout.";
									} 
									else if($type == 2) {
									// Redirection site 2
									$bdd ->exec("INSERT INTO serie (titre_se,desc_se,lien_se,genre_se,annee,pays) VALUES ('$titre','$description','$lien','$genre','$annee','$pays')");
										//print_r($bdd->errorInfo());
										//echo "INSERT INTO serie (titre_se,desc_se,lien_se,genre_se,annee,pays) VALUES ('$titre','$description','$lien','$genre','$annee','$pays')";
									 $idimage=$bdd->lastInsertId();
										echo "Merci de votre ajout.";
									}
									if(in_array ($type, array(1,2))){
										$error=array();
										$extension=array("jpeg","jpg","png","gif");
										$cptName=0;
										foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
										{
											$cptName++;
											$ext=pathinfo($_FILES["files"]["name"][$key],PATHINFO_EXTENSION);
											$file_name=$idimage."_".$type.".".$ext;
											$file_tmp=$_FILES["files"]["tmp_name"][$key];
											
											if(in_array($ext,$extension))
											{
												move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"./images/uploaded/".$file_name);	
											}
											else
											{
												array_push($error,"$file_name, ");
											}
										}
										
										$listFiles = glob('./images/uploaded/'.$idimage."_".$type."*");
										//print_r($listFiles);
										
										if(count($listFiles) != $cptName){
											die("bad picture upload");
										}
									}
								echo "</div>";
							}
								
							
						else {
							echo "Le film ou la série existe déjà.";
						} 
					}
					
					
					?>
						
				
				<h2>Ajout épisode de série :</h2>
				
				<form action="#" method="post">
					<label>Titre : </label><input type="text" style="width: 20%;"name="titre" value="" /><br />
					<label>Description : </label><textarea name="description2"  rows=20 cols=200/></textarea><br />
					<label>Lien : </label><input type="text" style="width: 20%;"name="lien" value="" /> <br />
						<?php
					echo '<label>Série :</label><select onChange="defineEpIndex(this.options[this.selectedIndex].value);" id="serie" name="serie">';
						$sql = "SELECT id_se,titre_se FROM serie s ORDER BY titre_se";
						foreach ($bdd->query($sql) as $row) {
							echo '<option value="'.$row['id_se'].'" >'.$row['titre_se'].'</option>';
						}
						echo '</select><br />';
						?>
					<label>Numero episode : </label><input type="text" style="width: 20%;" id="num_ep" name="num_ep" value="" /> <br />
					<input type="submit" name="submit2"/>
				</form>
				
<?php 
	
		if(isset($_POST['submit2']))
	{
		$titre = $_POST['titre'];
		$description = $_POST['description2'];
		$lien = $_POST['lien'];
		$serie = $_POST['serie'];
		$num_ep = $_POST['num_ep'];
		
		$sql = "SELECT count(*) FROM serie s WHERE UPPER(s.titre_se) = UPPER('$titre')";
		$exist = false;
		foreach ($bdd->query($sql) as $row) {
			$exist = true;
		}
		if($exist){
			if(isset($_POST['type'])) {
				$type = ceil($_POST['type']);
			} 
			else {
				$type = 1;
			}
			 
				if($type == 1) {
				// Redirection site 1 
				$requete = $bdd ->query("INSERT INTO episode (titre_ep,desc_ep,lien_ep,id_se,numero_ep) VALUES ('$titre','$description','$lien','$serie','$num_ep')");
				//print_r($bdd->errorInfo());
				//echo "INSERT INTO episode (titre_ep,desc_ep,lien_ep) VALUES ('$titre','$description','$lien')";
				echo "Merci de votre ajout.";
				$requete = $bdd ->query("UPDATE serie set nomb_ep = nomb_ep+1 WHERE id_se = '$serie'");
				}
		}
	}
?>

<script type="text/javascript">

	var mapNbEp = new Map();
	
	<?php
		$sql = "SELECT id_se, nomb_ep FROM serie s";
		foreach ($bdd->query($sql) as $row) {
			echo 'mapNbEp.set(\''.$row['id_se'].'\', '.$row['nomb_ep'].');';
		}
	?>
	
function defineEpIndex(id_se){
	var nbEp = mapNbEp.get(id_se);
	document.getElementById('num_ep').value=nbEp+1;
}
</script>