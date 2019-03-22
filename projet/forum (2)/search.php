<?php require("includes/header.php"); 

$keywordDefaultValue="mot clé";

echo '
<form action="/search.php" method="POST">
	<input type="text" name="keyword" value="'.$keywordDefaultValue.'" />
	<input type="submit" name="submit" value="Chercher !" />
	<input type="reset" value="reset" />
</form>';

if(isset($_POST['submit']) && !empty($_POST['keyword']) && $_POST['keyword'] != $keywordDefaultValue){
	
	$searchedKeyWord = htmlspecialchars($_POST['keyword']);
	$querySearchedKeyWord='%'.$searchedKeyWord.'%';
	$sth = $bdd->prepare("SELECT posts.date, users.login, posts.titre, posts.contenu FROM forum.posts, forum.users WHERE users.id_u=posts.u_id AND UPPER(posts.contenu) LIKE UPPER(:content)");
	$sth->bindParam(':content', $querySearchedKeyWord);
	$sth->execute();
	//echo '<h1>'.$querySearchedKeyWord.'</h1>';
	$sth2 = $bdd->prepare("SELECT reponses.heure, users.login, posts.titre, reponses.contenu
							FROM forum.posts, forum.reponses, forum.users
							WHERE reponses.id_post = posts.id_p AND users.id_u = reponses.id_u AND UPPER(reponses.contenu) LIKE UPPER(:content)");
								$sth2->bindParam(':content', $querySearchedKeyWord);

	$sth2->execute();
	
	if($sth->rowCount() + $sth2->rowCount() > 0)
		echo "<br /><h2>Résultats</h2><br />";
	else
		echo "<br /><h2>aucun post trouvé !</h2><br />";
	
	while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
		echo "<h3>".$result['titre']."</h3>";
		echo "<span>".$result['date']."</span>&nbsp;<span>".$result['login']."</span>";
		echo "<p>".$result['contenu']."</p>";
	}
	
	while($result = $sth2->fetch(\PDO::FETCH_ASSOC)){
		echo "<h3>".$result['titre']."</h3>";
		echo "<span>".$result['heure']."</span>&nbsp;<span>".$result['login']."</span>";
		echo "<p>".$result['contenu']."</p>";
	}
	
	
}


?>