<?php require("include/header.php");
$formatter = new NumberFormatter('fr_FR',  NumberFormatter::CURRENCY);
?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>

<div id="recherche">
<h2> Recherche </h2>

<form method="get" action="search.php">
	<input type="text" name="surface_min" placeholder="surface_min">
	<input type="text" name="surface_max" placeholder="surface_max">
	<input type="text" name="nb_piece_min" placeholder="nb_piece_min">
	<input type="text" name="nb_piece_max" placeholder="nb_piece_max">
	<input type="text" name="rechercher" placeholder="rechercher...">
	<button type="submit" name="recherche">Lancer</button>
</form>

</div>

<div id="exempleannonce">
<h2> Dernieres Annonce </h2>
<?php 
	$sql = "SELECT categorie.libelle as catlib, biens.id_b as id_b, biens.nb_pieces as nb_pieces, 
					biens.surface as surface, biens.prix as prix, biens.date as date_bien, biens.description as description, biens.date as date, adresse.cp as cp, adresse.ville as ville 
			FROM biens, adresse, categorie 
			WHERE biens.id_adr=adresse.id_adr 
			  and categorie.id_cat=biens.id_cat LIMIT 5 ";
	
	$listeAnnonces = $bdd->query($sql);
		echo '<br />';
		echo '<br />';
		?> <table border=1>
			<th>preview</th><th>Type</th><th>Ville</th><th>surface (m²)</th><th>Nombre de pièces</th><th>Description</th><th>Prix</th><th>Date</th><th>Plus d'info</th><?php
	while($annonce = $listeAnnonces->fetch()){
		echo "<tr>";
		/*echo ."-";*/
		$listFiles = glob('image/uploaded/'.$annonce->id_b."_*");
		$cpt=0;
		echo '<td>';
		foreach($listFiles as $thisimage){
			$cpt++;
			//
			echo "<a class=\"zoombox zgallery".$annonce->id_b."\" href=\"".$thisimage."\"><img style=\"".(($cpt>1)?"display:none;":"")."\" widht=50 height=50 src=\"".$thisimage."\" /></a>";
		}
		if($cpt == 0)
			echo "<a class=\"zoombox zgallery".$annonce->id_b."\" href=\"image/NO_PICTURE.jpg\"><img widht=50 height=50 src=\"image/NO_PICTURE.jpg\" /></a>";
		echo '</td>';
		echo '<td>'.$annonce->catlib.'</td>';
		echo '<td>'.$annonce->cp.' - '.$annonce->ville.'</td>';
		echo '<td>'.$annonce->surface.'</td>';
		echo '<td>'.$annonce->nb_pieces.'</td>';
		echo '<td>'.$annonce->description.'</td>';
		echo '<td>'.$formatter->formatCurrency($annonce->prix, 'EUR').'</td>';
		echo '<td>'.$annonce->date_bien.'</td>';
		echo '<td><a href="/annonce.php?id_b='.$annonce->id_b.'"> Voir Bien </a>';
		echo '<tr />';
	}
	$listeAnnonces->closeCursor();
?>
</table>
</br>
</div>
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

<?php require("include/footer.php")?>