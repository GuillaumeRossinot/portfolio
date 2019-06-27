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
				
					if(isset($_GET['id_u']) && !empty($_GET['id_u'])){
						$id_u=$_GET['id_u'];
						$ip=$_SERVER['REMOTE_ADDR'];
						$bdd ->exec("INSERT INTO ip_ban (id_u, ip) VALUES ('$id_u', '$ip')");
						print_r($bdd->errorInfo());
						echo "user ".$id_u." is now banned";
					}
				?>
				