  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
			<h2>Mon compte :</h2>
					<!---<form action="#" method="post">
							<label>Nom :</label><input type="text" style="width: 5%;"name="Nom" value="" /><br />
							<label>Prenom :</label><input type="text" style="width: 5%;"name="Prenom" value="" /><br />
							<label>Pseudo :</label><input type="text" style="width: 5%;"name="Pseudo" value="" /><br />
							<label>Email :</label><input type="text" style="width: 5%;"name="Email" value="" /> <br />
							<label>Mdp :</label><input type="text" style="width: 5%;"name="Mdp" value="" /><br />
							<input type="submit" name="submit"/><br />----->
							<?php
							//print_r($_POST);
								$temps_restant = time();
						
								
								if($_SESSION['connecte'] = true AND !empty($_SESSION['id_u'])){
										
									if(isset($_POST['submit']) AND !empty($_POST['submit']))
									{
										$id_u=htmlspecialchars($_SESSION['id_u']);
										$email=htmlspecialchars($_POST['email']);
										$login=htmlspecialchars($_POST['pseudo']);
										$nom=htmlspecialchars($_POST['nom']);
										$prenom=htmlspecialchars($_POST['prenom']);

											$listExistingEmail=$bdd->query("SELECT email FROM users WHERE email='$email' AND id_u <> $id_u");
											
											if($listExistingEmail->fetch()){
												die("email already exists !");
											}
											
										try
										{
											$bdd->beginTransaction();
											echo "<h3>updating values ...";
											$requete = $bdd->prepare("UPDATE users SET pseudo =:login,email=:email,nom=:nom,prenom=:prenom WHERE ID_U=:uid");
											$requete->execute(array(
												'uid' => $id_u,
												'nom' => $nom,
												'prenom' => $prenom,
												'login' => $login,
												'email' => $email,
												)
											);

											if(isset($_POST['password_old']) AND !empty($_POST['password_old']) AND !empty($_POST['password_new']) AND !empty($_POST['password_new2'])){
												$old_mdp=sha1(htmlspecialchars($_POST['password_old']));
												$new_mdp=sha1(htmlspecialchars($_POST['password_new']));
												$new2_mdp=sha1(htmlspecialchars($_POST['password_new2']));
												
											/*echo "old : ".$old_mdp." SHA :".sha1($old_mdp);
											echo "new : ".$new_mdp." SHA :".sha1($new_mdp);
											echo "new_bis : ".$new2_mdp." SHA :".sha1($new2_mdp);*/
												//echo "SELECT 1 FROM USERS WHERE mdp='$old_mdp' AND ID_U=$id_u";
												$isPassOkRes=$bdd->query("SELECT * FROM USERS WHERE mdp='$old_mdp' AND ID_U=$id_u");
												
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
											}else if(!empty($_POST['password_old']) AND (!isset($_POST['password_new']) OR !isset($_POST['password_new2']) OR empty($_POST['password_new']) OR empty($_POST['password_new2']))){
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
										
										$sth = $bdd->prepare('SELECT pseudo, email, mdp, nom, prenom FROM users WHERE id_u=:uid');
										$sth->bindParam(':uid', $_SESSION['id_u']);
										$sth->execute();

										$result = $sth->fetch(\PDO::FETCH_ASSOC);
										echo '<div id="moncompte">
												<h2> Modification du profil </h2>';
										echo "<label for=\"email\">Nom:</label>
										<input type=\"text\" name=\"nom\" id=\"mynom\" value=\""; 
										echo $result['nom'];
										echo "\" /><br />";										
										echo "<label for=\"email\">Prenom:</label>
										<input type=\"text\" name=\"prenom\" id=\"myprenom\" value=\""; 
										echo $result['prenom'];
										echo "\" /><br />";										
										echo "<label for=\"email\">Pseudo:</label>
										<input type=\"text\" name=\"pseudo\" id=\"mypseudo\" value=\""; 
										echo $result['pseudo'];
										echo "\" /><br />";
										echo "<label for=\"email\">Email:</label>
										<input type=\"email\" name=\"email\" id=\"myemail\" value=\""; 
										echo $result['email'];
										echo "\" /><br />";
										echo "<label for=\"password_old\">OLD password:</label>
										<input type=\"password\" name=\"password_old\" id=\"password_old\" value=\"\" /><br />";
										echo "<label for=\"password_new\">NEW password:</label>
										<input type=\"password\" name=\"password_new\" id=\"password_new\" value=\"\" /><br />";
										echo "<label for=\"password_new2\">Repeat NEW password:</label>
										<input type=\"password\" name=\"password_new2\" id=\"password_new2\" value=\"\" /><br />";
										echo "<input type=\"submit\" name=\"submit\"/></form>";
										
											
													
							if(isset($_POST['submitabo']))
							{
								$id_u=$_SESSION['id_u'];
								$type = $_POST['type'];
								
								$requete = $bdd->query("SELECT date_fin FROM abonnement WHERE id_u = ".$_SESSION['id_u']." ORDER BY date_fin DESC");
								$reponse = $requete->fetch();
								$temps_restant = $reponse['date_fin'];
								if(!($temps_restant > 0)){
									$temps_restant=time();
								}
								
								if(isset($type) && $type == 1) {
									$fin = $temps_restant + (2 * 24 * 60 * 60);
								} 
								else if(isset($type) && $type == 2) {
									$fin = $temps_restant  + (3 * 24 * 60 * 60);
								}
								else if(isset($type) && $type == 3) {
									$fin = $temps_restant + (5 * 24 * 60 * 60);
								}
								else{
									$fin = $temps_restant;
								}
								if(isset($fin) && !empty($fin)){
									
									$bdd ->exec("INSERT INTO abonnement(date_deb, date_fin, id_u, type) VALUES('$temps_restant', '$fin', '$id_u', '$type')");
									//print_r($bdd->errorInfo());
								}
							}
									
										
								}
							?>
							<br />
							<!-- Gestion abonnement--->
							<strong>Temps restant abonnement :</strong> 
							<?php 

								/*$requete = $bdd->query("INSERT INTO abonnement(date_deb,date_fin,type,id_u) VALUES(($timestamp),($fin),1,1)");*/
							
								$requete = $bdd->query("SELECT date_fin FROM abonnement WHERE id_u = ".$_SESSION['id_u']." ORDER BY date_fin DESC");
								$reponse = $requete->fetch();
								$temps_restant = $reponse['date_fin'] - time();
								if($temps_restant > 0){

									
								$i_restantes = $temps_restant / 60;
								$H_restantes = $i_restantes / 60;
								$d_restants = $H_restantes / 24;

								$s_restantes = floor($temps_restant % 60); // Secondes restantes
								$i_restantes = floor($i_restantes % 60); // Minutes restantes
								$H_restantes = floor($H_restantes % 24); // Heures restantes
								$d_restants = floor($d_restants); // Jours restants
								
								echo $d_restants."j ". $H_restantes."h ".$i_restantes."m ".$s_restantes."s";
								}
								else
									echo "Pas d'abonnement en cours.";
							?><br />
							<label>Abonnement :</label><select name="type">
								<option value="1">2 jours</option>
								<option value="2">3 jours</option>
								<option value="3">5 jours</option>
							</select><br />
							<input type="submit" name="submitabo"/>
					</form>
					<?php
						
						?>