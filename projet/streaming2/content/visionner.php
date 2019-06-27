  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
<?php


	$requete = $bdd->query("SELECT * FROM serie WHERE id_se NOT IN(SELECT id_se FROM visionner WHERE id_u = 1) LIMIT 5");
	
	echo "<h2> Titre de série :</h2>";
	
	while($reponse = $requete->fetch())
	{
		echo "<h3>".$reponse['titre_se']."</h3>";
	}