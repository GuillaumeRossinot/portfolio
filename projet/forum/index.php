<?php require("includes/header.php");?>
       
     <div id="forum-general">

	<?php
		function displayLastPost($bdd){
			echo '<br /><h2>DERNIER POST</h2>';
			
			$sthp = $bdd->prepare("SELECT users.login, id_p, titre, date, contenu FROM forum.posts, forum.users WHERE posts.u_id=users.id_u ORDEr BY id_p DESC");
			$sthp->bindParam(':postid', $postid);
			$sthp->execute();
			$resultp = $sthp->fetch(\PDO::FETCH_ASSOC);
					echo "<li><img src=\"img/Newmessage.png\" width=50 height=50 />&nbsp;<i>".$resultp['login']."</i>&nbsp";
					echo "<a href=\"index.php?postid=".$resultp['id_p']."\">";
					echo $resultp['titre'];
					echo "</a>&nbsp;".$resultp['date']."&nbsp;</li>";
			
		}
		if(!isset($_GET['topicid']) OR empty($_GET['topicid']) OR !is_numeric($_GET['topicid'])) $topicid="";
		else $topicid=htmlspecialchars($_GET['topicid']);
		if(!isset($_GET['postid']) OR empty($_GET['postid']) OR !is_numeric($_GET['postid'])) $postid="";
		else $postid=htmlspecialchars($_GET['postid']);
		

		if(isset($_GET['topicid']) && is_numeric($_GET['topicid']))
echo '<a href="/newpost.php?topicid='.$_GET['topicid'].'">Ajouter un post</a>';
else
echo '<a href="/newpost.php">Ajouter un post</a>';
		
		if(isset($_POST['content_reponse']) && isset($_POST['postid'])
		&& !empty($_POST['content_reponse']) && !empty($_POST['postid'])){
			if(empty($_SESSION['id_u']))
				echo 'veuillez vous connecter pour insérer !';
			else{
				$myContent = htmlspecialchars($_POST['content_reponse']);
				$sth = $bdd->prepare("INSERT INTO REPONSES (CONTENU, ID_POST, ID_U) VALUES (:mycontent, :postid, :id_u)");
				$sth->bindParam(':mycontent', $myContent);
				$sth->bindParam(':postid', $postid);
				$sth->bindParam(':id_u', $_SESSION['id_u']);
				$sth->execute();
			}
		}

		echo '<br /><br />';	
		if(isset($postid) AND !empty($postid)){
			
			$sth = $bdd->prepare("SELECT categories.titre
									FROM categories, topics, posts
								   WHERE categories.cat_id=topics.cat_id
								 	 AND topics.id_t=posts.t_id
								     AND posts.id_p=:postid");
			$sth->bindParam(':postid', $postid);
			$sth->execute();
			$result = $sth->fetch(\PDO::FETCH_ASSOC);
			echo '<h2>';
			echo $result['titre'];
			echo '</h2>';
	?>
	<div id="post">
	<?php
			
			$sthp = $bdd->prepare("SELECT users.login, id_p, titre, date, contenu FROM forum.posts, forum.users WHERE posts.u_id=users.id_u AND id_p=:postid");
			$sthp->bindParam(':postid', $postid);
			$sthp->execute();
			while($resultp = $sthp->fetch(\PDO::FETCH_ASSOC)){
				echo '<h3>';
				echo $resultp['titre'];
				echo '</h3>';
                echo '<h4>';
                echo $resultp['login'];
                echo ', le ';
                echo $resultp['date'];
                echo '</h4>';
				echo '<p>';
				echo $resultp['contenu'];
				echo '</p>';
			}
			?></div>
			<?php
		$sthp = $bdd->prepare("SELECT contenu, heure, users.login FROM forum.reponses, forum.users WHERE id_post=:postid AND reponses.id_u=users.id_u ORDER BY id_reponse");
$sthp->bindParam(':postid', $postid);
$sthp->execute();
echo "réponses : ";
while($resultp = $sthp->fetch(\PDO::FETCH_ASSOC)){
    ?>
<div id="reponse"><?php
                echo '<h4>';
                echo $resultp['login'];
                echo ', le ';
                echo $resultp['heure'];
                echo '</h4>';   
echo '<p>';
echo $resultp['contenu'];
echo '</p>';
} ?>
         </div>
         <?php		
			/* module réponse */
			echo '<form action="/www/index.php?postid=';
			echo $postid;
			echo '" method=POST>
				<textarea name="content_reponse">Votre réponse ici ...</textarea>
				<input type="hidden" name="postid" value="';
			echo $postid;echo '" />
				<input type="submit" name="submit_answer" value="répondre !" />
			</form>
			';
			
		}
		else
		{
			if(empty($topicid)){
				$sth_cat = $bdd->prepare("SELECT cat_id, titre from categories");
				$sth_cat->execute();
				
				while($result_cat = $sth_cat->fetch(\PDO::FETCH_ASSOC)){
					echo '<h2>';echo $result_cat['titre'];echo '</h2>';
					$sth = $bdd->prepare("SELECT topics.id_t, topics.titre, topics.description 
											FROM forum.topics
											WHERE topics.id_t_pere IS NULL
											  AND cat_id =:cat_id");
					$sth->bindParam(':cat_id', $result_cat['cat_id']);
					$sth->execute();

					while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
						echo "<li><img src=\"img/Newmessage.png\" width=50 height=50 /><a href=\"index.php?topicid=";
						echo $result['id_t'];
						echo "\">";
						echo $result['titre'];
						echo "</a></li>";
					}
				}
			}
			else{
							
				$sth = $bdd->prepare("SELECT categories.titre
										FROM categories, topics
									   WHERE categories.cat_id=topics.cat_id
										 AND topics.id_t=:topicid");
				$sth->bindParam(':topicid', $topicid);
				$sth->execute();
				$result = $sth->fetch(\PDO::FETCH_ASSOC);
				echo '<h2>';
				echo $result['titre'];
				echo '</h2>';
				
				$sth = $bdd->prepare("SELECT id_t,titre, description FROM forum.topics WHERE id_t_pere=:topicid");
				$sth->bindParam(':topicid', $topicid);
			

				$sth = $bdd->prepare("SELECT id_t,titre, description FROM forum.topics WHERE id_t_pere=:topicid");
				$sth->bindParam(':topicid', $topicid);
				$sth->execute();

				while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
					echo "<li><img src=\"img/Newmessage.png\" width=50 height=50 /><a href=\"index.php?topicid=";
					echo $result['id_t'];
					echo "\">";
					echo $result['titre'];
					echo "</a></li>";
				}
				
				
				
				$sth = $bdd->prepare("SELECT posts.date, users.login, posts.id_p,posts.titre FROM forum.posts, forum.users WHERE users.id_u=posts.u_id AND posts.t_id=:topicid");
				$sth->bindParam(':topicid', $topicid);
				$sth->execute();
				
				if($sth->rowCount() > 0)
					echo "<br /><h2>POSTS</h2><br />";
				
				while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
					echo "<li><img src=\"img/Newmessage.png\" width=50 height=50 />&nbsp;<i>".$result['login']."</i>&nbsp";
					echo "<a href=\"index.php?postid=".$result['id_p']."\">";
					echo $result['titre'];
					echo "</a>&nbsp;".$result['date']."&nbsp;";
					echo '<a href="/deletepost.php?deletepostid='.$result['id_p'].'" /> X </a>';
					echo "</li>";
				}
			}
		}
			displayLastPost($bdd);
			
	?>
	</div>
	
	<div style="clear:both;"> </div>
	<br />
		<div id="enligne">
		<h5>Qui est en ligne</h5>
		<p><?php 
			$sthp = $bdd->prepare("SELECT users.login FROM forum.users WHERE lastAction > (now() - INTERVAL 5 MINUTE)");
			$sthp->execute();
			while($resultp = $sthp->fetch(\PDO::FETCH_ASSOC)){
					echo "&nbsp;".$resultp['login'];
			}
		?></p>
    </div>


<?php require("includes/footer.php"); 
/*INSERT INTO `topics`(id_t_pere,titre,description,cat_id) VALUES(NULL,'test_pre_1','desc1',NULL);*/
/*INSERT INTO `posts`(contenu,titre,t_id,u_id) VALUES('content1','titre_post_1','1',5);*/
?>