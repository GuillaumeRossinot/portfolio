<?php require("includes/header.php"); ?>
<?php require("includes/function.php")?>

<div id="register">
<?php   
    if(isset($_POST['submit']))
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
        
        $requete = $bdd ->query("INSERT INTO users (login,mdp,email) VALUES ('$login','$mdp','$email')");
        header("Location:login.php");
        
    }

?>

<form action="#" method="post" enctype="multipart/from-data">
    login<input type="text" name="login" ><br />
    Mdp<input type="password" name="mdp" ><br />
    Email<input type="email" name="email" ><br />
    Avatar<input type="file" name="submit" ><br />
    <input type="submit" name="submit"/>
    
</form>
</div>

</body>

</html>