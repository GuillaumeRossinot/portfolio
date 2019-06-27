<?php $title = "Connexion" ;
require dirname(__FILE__).'/../controller/logincontroller.php'; ?>
<link rel="stylesheet" type="text/css" href="view/CSS/login.css" media="all"/>

<div id="login">
  <h2>Login</h2>
    <form action="<?php dirname(__FILE__).'/?p=login' ?>" method="post">
        <label for="text">Username:</label>
        <input type="text" name="username" id="username"/><br />
        <label for="mdp">Mdp:</label>
        <input type="password" name="mdp" id="mdp"><br />
        <input type="submit" name="submit"/><input type="checkbox" name="souvenir" /><label>Se souvenir de moi ?</label><br />
        <a href="?p=register"> Pas encore inscrit ?</a><br>
        <a href="?p=passoublier"> Mot de passe oublié?</a>
    </form>

</div>
