<?php require("includes/header.php"); ?>


<div id="liste-membre">
    <h1>liste de membre</h1>


    <ul>
<?php
				$sth = $bdd->prepare("SELECT login FROM forum.users ORDER BY ID_U");
				$sth->execute();
				
				while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
					echo "<li>";
					echo $result['login'];
					echo "</li>";
				}
?>
    </ul>


</div>