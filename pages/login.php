

<div id="login">

<?php    if(isset($_POST['submit']))
{
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        
		//echo "SELECT * FROM users WHERE login = '".$login."' AND mdp = '".$mdp."'";
		
        $requete = $bdd->query("SELECT * FROM users WHERE login = '$login' AND mdp = '$mdp'");
        
        if($reponse = $requete->fetch())
        {
            $_SESSION['connecte'] = true;
            $_SESSION['id_u'] = $reponse->id_u;
			$_SESSION['lvl'] = $reponse->lvl;
            header("Location:index.php");
        }
        else
        {
            echo "Mauvais identifiants";
        }
}
?>
<h2>Login</h2>
<form action="#" method="post">
    <label for="login">login:</label>
    <input type="login" name="login" id="login"/><br />
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