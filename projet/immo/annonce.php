<?php require("include/header.php");
?>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>
<?php

			$id_b=$_GET['id_b'];
			//echo $id_b;

    	$sql = $bdd->prepare ("SELECT categorie.libelle as catlib, biens.id_b as id_b, biens.nb_pieces as nb_pieces, biens.prix as prix,
					biens.surface as surface,biens.date as date, biens.description as description, adresse.cp as cp, adresse.ville as ville,
					users.email as mail, users.numtel as numtel
			FROM biens, adresse, categorie, users 
			WHERE biens.id_adr=adresse.id_adr 
			  and categorie.id_cat=biens.id_cat
			  and biens.id_b='$id_b'");
		$sql->execute();
              
				$annonce = $sql->fetch();
		echo "<tr>";
				$listFiles = glob('image/uploaded/'.$annonce->id_b."_*");
				$cpt=0;
				echo '<td>';
				foreach($listFiles as $thisimage){
					$cpt++;
					echo "<div id='photoannonce'>Photo du bien </br><a style=\"clear:both;\" class=\"zoombox zgallery".$annonce->id_b."\" href=\"".$thisimage."\"><img style=\"".(($cpt>1)?"display:none;":"")."\" widht=400 height=400 src=\"".$thisimage."\" /></a></div>";
				}
				if($cpt == 0)
					echo "<a class=\"zoombox zgallery".$annonce->id_b."\" href=\"image/NO_PICTURE.jpg\"><img widht=400 height=400 src=\"image/NO_PICTURE.jpg\" /></a>";
				echo '</td>';
				echo '<td><div id="infoannonce"> Type de bien :'.$annonce->catlib.'</td></br>';
				echo '<td> Ville :'.$annonce->cp.' - '.$annonce->ville.'</td></br>';
				echo '<td> Surface :'.$annonce->surface.' m²</td></br>';
				echo '<td> Nombre de pieces :'.$annonce->nb_pieces.'</td></br>';
				echo '<td> Description du bien :'.$annonce->description.'</td></br>';
				echo '<td> Date de mise en vente :'.$annonce->date.'</td></br>';
				echo '<td> Prix de vente :'.$annonce->prix.'</td></br></br></div>';
				echo '<tr />';
		if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == 1){
			?>
			<div id="infovendeur">
			Téléphone : <?php echo'<td>'.$annonce->numtel.'</td>'?></br>
			Adresse email : <?php echo'<td>'.$annonce->mail.'</td>'?></br>
			</div>
			<?php
		}
?>

<script type="text/javascript">
		jQuery(function($){
			//$('a.zoombox').zoombox();

			$('a.zoombox').zoombox({
				theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
				opacity     : 0.8,              // Black overlay opacity
				duration    : 800,              // Animation duration
				animation   : true,             // Do we have to animate the box ?
				width       : 600,              // Default width
				height      : 400,              // Default height
				gallery     : true,             // Allow gallery thumb view
				autoplay : false                // Autoplay for video
			});
		});
	</script>

<?php require("include/footer.php");?>