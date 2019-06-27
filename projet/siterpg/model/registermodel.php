<?php
require ("model.php");

function isFilledField($champ)
    {
      return (isset($champ) && !empty($champ));
    }

function register()
{
            global $bdd;

					if(isset($_POST['submit']))
					{
						 $Mdp = sha1($_POST['Mdp']);
						 $Email = $_POST['Email'];
						 $name = $_POST['name'];
						 $lastname = $_POST['lastname'];
             		 	 $birthdate = $_POST['birthdate'];
             			 $username = $_POST['username'];
						 $submit = $_POST['submit'];
            			 $exist = false;

						//echo "INSERT INTO users (name,lastname,password,email) VALUES ('".$name."','".$lastname."','".$Mdp."','".$Email."')"; //test requete sql
							$requete = $bdd->query( "SELECT * FROM users WHERE email='$Email' OR username = '$username'");

								if ($reponse = $requete->fetch()) {
									$exist = true;

								}

						if ($exist != true){
								if (isFilledField($name) && isFilledField($lastname) && isFilledField($Email) && isFilledField($Mdp) && isFilledField($username) && isFilledField($birthdate))
								 {
                   //echo"INSERT INTO user (email,password,name,lastname) VALUES ('$Email','$Mdp','$name','$lastname')";
									 $requete = $bdd ->query("INSERT INTO users (username,email,password,name,lastname,birthdate) VALUES ('$username','$Email','$Mdp','$name','$lastname','$birthdate')");
                 echo "Merci de vous être inscrit, " , $lastname , " " , $name ;
								 }
							}
						else
            {
							echo "Le compte existe déjà. <br>";
							}
						//header("Location:login.php");

  					}
    }
?>
