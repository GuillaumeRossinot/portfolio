<?php require("includes/header.php");?>
<?php


	function getSons($bdd, $id_t, $i){
		$i++;
		$sth = $bdd->prepare("SELECT topics.id_t, topics.titre
								FROM forum.topics
							   WHERE topics.id_t_pere = :id_t ORDER BY topics.titre");
		$sth->bindParam(':id_t', $id_t);
		$sth->execute();
		while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
			echo '<option value="'.$result['id_t'].'">'.displayTab($i).$result['titre'].'</option>';
			getSons($bdd, $id_t, $i);
		}
	}

	
	if(isset($_POST['submit']) && !empty($_POST['topicid']) && !empty($_POST['titre']) && !empty($_POST['contenu'])){
		try{
				if(is_numeric($_POST['topicid']))
					$escapedtopicid=$_POST['topicid'];
				else
					die("invalid topic");
				$idu=$_SESSION['id_u'];
				$contentescaped=htmlspecialchars($_POST['contenu']);
				$titleescaped=htmlspecialchars($_POST['titre']);
				$sth = $bdd->prepare("INSERT INTO FORUM.POSTS (CONTENU, T_ID, U_ID, TITRE) VALUES(:content,:topicid,:userid,:title)");
				$sth->bindParam(':content', $contentescaped);
				$sth->bindParam(':topicid', $escapedtopicid);
				$sth->bindParam(':userid', $idu);
				$sth->bindParam(':title', $titleescaped);
			
				$sth->execute();
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}
		echo "votre post a bien été envoyé";
		header( "refresh:3;url=/index.php?postid=".$bdd->lastInsertId());
	}
	else{
?>

<form action="/newpost.php" method=POST>
	<input type="text" name="titre" value="titre" /><br />
	<textarea name="contenu">contenu</textarea><br />
	<select name="topicid">
		<?php
		

		$i = 0;
		$sth = $bdd->prepare("SELECT topics.id_t, topics.titre
								FROM forum.topics
							   WHERE topics.id_t_pere IS NULL ORDER BY topics.titre");
		$sth->execute();

		while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
			echo '<option value="'.$result['id_t'].'" '.((isset($_GET['topicid']) AND is_numeric($_GET['topicid']) AND $_GET['topicid']==$result['id_t'])?'selected="selected"':'').'>'.$result['titre'].'</option>';
			getSons($bdd, $result['id_t'], $i);
		}
		?>
	</select><br />
	<input type="submit" name="submit" value="Poster !" /><br />
	<input type="reset" value="reset" /><br />
</form>
<?php
	}
/*select topics.titre from forum.topics where topics.id_t_pere=:id_topic*/

?>