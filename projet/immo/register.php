<?php require("include/header.php"); ?>
<?php require("include/function.php")?>

<div id="register">
<?php   
    if(isset($_POST['submit']))
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
		$level = $_POST['lvl'];
        
		//echo "INSERT INTO users (login,mdp,email,lvl) VALUES ('".$login."','".$mdp."','".$email."','".$level."')"; //test requete sql
		
        $requete = $bdd ->query("INSERT INTO users (login,mdp,email,lvl) VALUES ('$login','$mdp','$email','$level')");
        //header("Location:login.php");
        
    }
	
?>
	<h2>Inscription</h2>
<form action="#" method="post" enctype="multipart/from-data">
    login : <input type="text" name="login" ><br />
    Mdp : <input type="password" name="mdp" ><br />
    Email : <input type="email" name="email" ><br />
	Type de compte : <select name="lvl" id="lvl">
           <option value="3">Acheteur</option>
           <option value="2">Vendeur</option>
       </select><br />
    <input type="submit" name="submit"/>
    
</form>
</div>

</body>

</html>