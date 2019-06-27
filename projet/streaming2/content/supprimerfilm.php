<?php
	if(!isset($_SESSION['connecte']) || $_SESSION['lvl'] !=3){
		
		header( "Refresh:5; url=index.php", true, 303);
		die("vous n'êtes pas autorisé !");
		
	}
?>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">
				
				<?php
				
					if(isset($_GET['id_f']) && !empty($_GET['id_f'])){
						$id_f=$_GET['id_f'];
						$bdd ->exec("DELETE FROM film WHERE id_f='$id_f'");
						//print_r($bdd->errorInfo());
						echo "Le film ".$id_f." a été supprimé.";
					}
				?>
				