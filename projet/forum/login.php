<?php require("includes/header.php"); ?>

<div id="login">

<?php    if(isset($_POST['submit']))
{
        $email = $_POST['email'];
        $mdp = sha1($_POST['mdp']);
        
        $requete = $bdd->query("SELECT * FROM users WHERE email = '$email' AND mdp = '$mdp'");
        
        if($reponse = $requete->fetch())
        {
            $_SESSION['connecte'] = true;
            $_SESSION['id_u'] = $reponse['id_u'];
            header("Location:index.php");
        }
        else
        {
            echo "Mauvais identifiants";
        }
}
?>

<form action="#" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"/><br />
    <label for="mdp">Mdp:</label>
    <input type="password" name="mdp" id="mdp"><br />
    <input type="submit" name="submit"/>
    <a href="register.php"> Pas encore inscrit ?</a>
    <a href="register.php"> Mot de passe oublié</a>
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

<?php require("includes/footer.php"); ?>