  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
		 <?php
		 
			$isAdmin=false;
		 
				if(isset($_SESSION['connecte']) && $_SESSION['lvl'] ==3){
					$isAdmin=true;					
				}
				$id_u=$_SESSION['id_u'];
				$sql = "SELECT count(1) FROM `abonnement` WHERE UNIX_TIMESTAMP() BETWEEN date_deb AND date_fin AND ID_U='".$_SESSION['id_u']."'";

				$requete = $bdd->query($sql);
				$reponse = $requete->fetch();
				
				$isAboOK=false;
				
				if($reponse['count(1)'] > 0)
					$isAboOK=true;
				
				if($isAdmin && isset($_POST['submit']) && !empty($_POST['submit'])){
					
					print_r($_POST);
					/*
					on traite ici la modification
					*/
					
				}
					//print_r($_GET);
				if(isset($_GET['note']) && !empty($_GET['note']) && isset($_GET['note']) && !empty($_GET['note']) && isset($_GET['id_v']) && !empty($_GET['id_v']) && isset($_GET['type_v']) && !empty($_GET['type_v'])){
					$note = $_GET['note'];
					$type = $_GET['type_v'];
					$id_v = $_GET['id_v'];
					
					// TODO : controler si une entrée existe déjà. Si oui, on supprime ou on update
					
					$noteCptsql = "select sum(tablecpt.cpt) as cptres from (SELECT count(1) as cpt from notefilm where id_f = '$id_v' AND id_u='$id_u' AND '1'=$type UNION SELECT count(1) from noteserie where id_se = '$id_v' AND id_u='$id_u' AND '2'=$type) tablecpt";
					$noteCptQuery = $bdd->query($noteCptsql);
					$noteCptRow=$noteCptQuery->fetch();
					 
					 //print_r ($noteCptRow);
					 
					if($noteCptRow['cptres'] > 0){
							
						if($type==1){
							$bdd ->exec("UPDATE notefilm SET NOTE='$note' WHERE id_f='$id_v' AND id_u='$id_u'");
							//print_r($bdd->errorInfo());
						}
						elseif($type==2){
							$bdd ->exec("UPDATE noteserie SET NOTE='$note' WHERE id_se='$id_v' AND id_u='$id_u'");
							//print_r($bdd->errorInfo());
						}
						else
							echo "type introuvable";
						
					}
					else{
							
						if($type==1){
							$bdd ->exec("INSERT INTO notefilm (id_f,id_u,note) VALUES ('$id_v', '$id_u', '$note')");
							//print_r($bdd->errorInfo());
						}
						elseif($type==2){
							$bdd ->exec("INSERT INTO noteserie (id_se,id_u,note) VALUES ('$id_v', '$id_u', '$note')");
							//print_r($bdd->errorInfo());
						}
						else
							echo "type introuvable";
						
					}
					
					
				}
				if(isset($_GET['id_v']) && !empty($_GET['id_v']) && isset($_GET['type_v']) && !empty($_GET['type_v'])){
					$type = $_GET['type_v'];
					$id_v = $_GET['id_v'];
				$sql = "SELECT titre_f as titre,desc_f as description, '1' as type, lien_f as link FROM film f WHERE id_f='$id_v' AND 1=$type UNION SELECT titre_se as titre,desc_se as description, '2' as type, lien_se as link FROM serie s WHERE id_se = '$id_v' AND 2=$type";
								
								foreach ($bdd->query($sql) as $row) {
									
									$notesql = "SELECT note from notefilm where id_f = '$id_v' AND id_u='$id_u' AND '1'=$type UNION SELECT note from noteserie where id_se = '$id_v' AND id_u='$id_u' AND '2'=$type";
									$noteQuery = $bdd->query($notesql);
									$noteRow=$noteQuery->fetch();
									
									$note=$noteRow['note'];

									if(!isset($note) || empty($note)){
										$notesql = "SELECT AVG(note) from notefilm where id_f = '$id_v' AND '1'=$type UNION SELECT note from noteserie where id_se = '$id_v' AND '2'=$type";
										$noteQuery = $bdd->query($notesql);
										$noteRow=$noteQuery->fetch();
										
										$note=$noteRow['AVG(note)'];
										if(!isset($note) || empty($note)){
											$note = 0;
										}
									}
									
									if($isAdmin){
										echo '<form action="" method="post" enctype="multipart/form-data">';
										
									}
									
									if($type == 1){
										echo '<h2>Film :</h2>';
									}
									elseif ($type == 2){
										echo '<h2>Serie :</h2>';
									}	
									
									$listFiles = glob('./images/uploaded/'.$id_v.'_'.$type.'*');
									if(isset($listFiles[0]) && !empty($listFiles[0])){
										$lienImage=$listFiles[0];
									}
									else
										$lienImage='images/uploaded/unknown.jpg';
										
									echo '<img src="'.$lienImage.'" alt="pic of the video" /><br />';
										
									if($isAdmin){
											echo '<label for="picup">change picture : </label><input type="file" name="picup" id="picup" value="upload file" />';
											echo '<h3><input type="text" name="titre" value="'.$row['titre'].'" /></h3><br />
													<p><textarea type="text" name="description">'.$row['description'].'</textarea></p>
													<p>Note :
													<div class="rating">
															<a '.(($note==5)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=5&id_v='.$id_v.'&type_v='.$type.'" title="Donner 5 étoiles">☆</a>
															   <a '.(($note==4)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=4&id_v='.$id_v.'&type_v='.$type.'" title="Donner 4 étoiles">☆</a>
															   <a '.(($note==3)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=3&id_v='.$id_v.'&type_v='.$type.'" title="Donner 3 étoiles">☆</a>
															   <a '.(($note==2)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=2&id_v='.$id_v.'&type_v='.$type.'" title="Donner 2 étoiles">☆</a>
															   <a '.(($note==1)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=1&id_v='.$id_v.'&type_v='.$type.'" title="Donner 1 étoile">☆</a>
													</div></p>';
													if($type == 1){
														echo '<p><input type="text" name="lien" value="'.$row['link'].'" /></p>';
													}
													echo '<p><input type="submit" name="submit" value="submit" /></p>';
										
									}
									else{
										
											echo '<table>
													<tr>
														<th>Titre :<br /></th>
														<th>Descritpion :</th>
														<th>Note :</th>
														<th>Liens :</th>
													</tr>
													<tr>
													 <td>'.$row['titre'].'</td>
													  <td>'.$row['description'].'</td>
														<td><div class="rating">
																<a '.(($note==5)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=5&id_v='.$id_v.'&type_v='.$type.'" title="Donner 5 étoiles">☆</a>
															   <a '.(($note==4)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=4&id_v='.$id_v.'&type_v='.$type.'" title="Donner 4 étoiles">☆</a>
															   <a '.(($note==3)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=3&id_v='.$id_v.'&type_v='.$type.'" title="Donner 3 étoiles">☆</a>
															   <a '.(($note==2)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=2&id_v='.$id_v.'&type_v='.$type.'" title="Donner 2 étoiles">☆</a>
															   <a '.(($note==1)?'class="rating_selected"':'').' href="index.php?p=viewsvideo&note=1&id_v='.$id_v.'&type_v='.$type.'" title="Donner 1 étoile">☆</a>
													</div></td>';
										if($type == 1){
											if($isAboOK)
												echo '<td><a href="'.$row['link'].'">Liens</a></td>';
											else
												echo '<td><a href="index.php?p=moncompte" >Vous devez être abonné pour voir le lien</a><br /></td>
												</tr>
											</table>';
											
										} 
									}
									
									if ($type == 2){
										//echo 'épisodes : <br />';
										$sqlEpisodes = "SELECT * from episode WHERE id_se=$id_v ORDER BY numero_ep";
										$nbEp=0;
										foreach ($bdd->query($sqlEpisodes) as $episode) {
											$nbEp++;
											if($isAboOK)
												echo '<td>&nbsp;<a href="'.$episode['lien_ep'].'" >'.$episode['numero_ep'].') '.$episode['titre_ep'].'</a><br />&nbsp;</td>';
											else
												echo '<td>&nbsp;<a href="index.php?p=moncompte" >'.$episode['numero_ep'].') Vous devez être abonné pour voir le lien</a><br />&nbsp;</td>';
										}
											echo '</tr>
											</table>';
										if($nbEp==0)
											echo '<td>Pas d\'épisodes pour cette série.</td>';
										echo '</tr></table><br />';
									}	
									
									if($isAdmin){
										echo '</form>';
									}									
								}
					}
				?>