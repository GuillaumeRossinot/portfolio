        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-10 show-grid-left main-grids">
					<?php    if(isset($_POST['submit']))
					{
							$email = $_POST['email'];
							$mdp = sha1($_POST['mdp']);
							
							//echo "SELECT * FROM users WHERE email = '".$email."' AND mdp = '".$mdp."'";
							

		
							$requete = $bdd->query("SELECT * FROM users WHERE email = '$email' AND mdp = '$mdp'");
							
							if($reponse = $requete->fetch())
							{
								$_SESSION['connecte'] = true;
								$_SESSION['id_u'] = $reponse['id_u'];
								$_SESSION['lvl'] = $reponse['lvl'];
								header("Location:index.php?p=accueil");
							}
							else
							{
								echo "Mauvais identifiants";
							}
					}
					?>
					<h2>Login</h2>
					<form action="#" method="post">
						<label for="email">Email:</label>
						<input type="email" name="email" id="email"/><br />
						<label for="mdp">Mdp:</label>
						<input type="password" name="mdp" id="mdp"><br />
						<input type="submit" name="submit"/>
						<a href="register.php"> Pas encore inscrit ?</a>
					</form>

					<label>Se souvenir de moi ?</label><input type="checkbox" name="souvenir" /><br />

					</div>
					<?php

					if (isset($_POST['souvenir']))

					{

					$expire = time() + 365*24*3600;

					setcookie('pseudo', $_SESSION['pseudo'], $expire); 

					}

					?>
			<div class="clearfix"> </div>