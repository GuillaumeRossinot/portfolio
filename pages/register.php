
<?php   
    if(isset($_POST['submit']))
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        
		//echo "INSERT INTO users (login,mdp,email,lvl) VALUES ('".$login."','".$mdp."')"; //test requete sql
		
        $requete = $bdd ->query("INSERT INTO users (login,mdp) VALUES ('$login','$mdp')");
        //header("Location:login.php");
        
    }
	
?>

	<h2>Inscription</h2>
<form action="#" method="post" enctype="multipart/from-data">
    login : <input type="text" name="login" ><br />
    Mdp : <input type="password" name="mdp" ><br />
    <input type="submit" name="submit"/>
    
</form>