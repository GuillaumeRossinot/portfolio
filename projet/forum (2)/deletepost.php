<?php require("includes/header.php");?>
       
     <div id="forum-general">

	<?php
			if(isset($_GET['deletepostid']) && !empty($_GET['deletepostid']) && is_numeric($_GET['deletepostid'])){
				$postid = $_GET['deletepostid'];
				$uid = $_SESSION['id_u'];
				
				$sth = $bdd->prepare("DELETE FROM FORUM.POSTS WHERE ID_P=:postid AND U_ID=:uid");
				$sth->bindParam(':postid', $postid);
				$sth->bindParam(':uid', $uid);
				$sth->execute();
				$result = $sth->rowCount();
				if($result > 0)
					echo "post ".$postid." supprimé avec succès";
				else
					echo "aucun post correspondant.";
				
				header( "refresh:5;url=/index.php");
				
			}
			else{
				echo "Merci de saisir un post ID valide.";
			}
	?>
	</div>
	
	<div style="clear:both;"> </div>
	<br />
	<br />
	<div id="enligne">
		<h5>Qui est en ligne</h5>
    </div>


<?php require("includes/footer.php"); 
/*INSERT INTO `topics`(id_t_pere,titre,description,cat_id) VALUES(NULL,'test_pre_1','desc1',NULL);*/
/*INSERT INTO `posts`(contenu,titre,t_id,u_id) VALUES('content1','titre_post_1','1',5);*/
?>