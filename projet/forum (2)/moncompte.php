<?php require("includes/header.php");

if($_SESSION['connecte'] = true AND !empty($_SESSION['id_u'])){
		
	if(isset($_POST['submit']) AND !empty($_POST['submit']))
	{
		try
		{
			echo "<h3>updating values ...</h3>";
			$requete = $bdd->prepare("UPDATE USERS(LOGIN,EMAIL,LVL,AVATAR) SET (:login,:email,:lvl,:avatar) WHERE ID_U=:uid");
			$requete->execute(array(
				'uid' => htmlspecialchars($_SESSION['id_u']),
				'login' => htmlspecialchars($_POST['login']),
				'email' => htmlspecialchars($_POST['email']),
				'lvl' => htmlspecialchars($_POST['lvl']),
				'avatar' => htmlspecialchars($_POST['avatar']),
				)
			);
			
			echo "<h3>done.</h3>";

		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		
	}
		echo "<form action=\"#\" method=\"post\">";
		
		$sth = $bdd->prepare('SELECT login, email, lvl, avatar FROM forum.users WHERE id_u=:uid');
		$sth->bindParam(':uid', $_SESSION['id_u']);
		$sth->execute();

		$result = $sth->fetch(\PDO::FETCH_ASSOC);
		echo "<label for=\"email\">login:</label>
		<input type=\"login\" name=\"login\" id=\"mylogin\" value=\""; echo $result['login'];
		echo "\" /><br />";
		echo "<label for=\"email\">Email:</label>
		<input type=\"email\" name=\"email\" id=\"myemail\" value=\""; echo $result['email'];
		echo "\" /><br />";
		echo "<label for=\"lvl\">lvl:</label>
		<input type=\"lvl\" name=\"lvl\" id=\"mylvl\" value=\""; echo $result['lvl'];
		echo "\" /><br />";
		echo "<label for=\"avatar\">avatar:</label>
		<input type=\"avatar\" name=\"avatar\" id=\"myavatar\" value=\""; echo $result['avatar'];
		echo "\" /><br />";
		echo "<input type=\"submit\" name=\"submit\"/></form>";


}
else{
	echo 'not connected';
}
?>