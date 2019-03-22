<?php require("include/header.php"); 
$formatter = new NumberFormatter('fr_FR',  NumberFormatter::CURRENCY);
?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>

<div id="exempleannonce">
<h2>Recherche de bien</h2>
<form id="searchBiens" method=GET action="" class="ajaxform">
	<label>Surface min :</label><input type="text" style="width: 5%;"name="surface_min" value="<?php echo ((isset($_GET['surface_min']))?$_GET['surface_min']:"surface_min"); ?>" />
	<label>Surface max :</label><input type="text" style="width: 5%;"name="surface_max" value="<?php echo ((isset($_GET['surface_max']))?$_GET['surface_max']:"surface_max"); ?>" />
	<label>Nombre de pièce min :</label><input type="text" style="width: 5%;"name="nb_piece_min" value="<?php echo ((isset($_GET['nb_piece_min']))?$_GET['nb_piece_min']:"nb_piece_min"); ?>" />
	<label>Nombre de pièce max :</label><input type="text" style="width: 5%;"name="nb_piece_max" value="<?php echo ((isset($_GET['nb_piece_max']))?$_GET['nb_piece_max']:"nb_piece_max"); ?>" />
	<label>Code Postal :</label><input style="width: 5%;" type="text" name="cp" value="<?php echo ((isset($_GET['cp']))?$_GET['cp']:"00000"); ?>" />
	<label>Prix min :</label><input style="width: 5%;" type="text" name="prix_min" value="<?php echo ((isset($_GET['prix_min']))?$_GET['prix_min']:"prix_min"); ?>" />
	<label>Prix max :</label><input style="width: 5%;" type="text" name="prix_max" value="<?php echo ((isset($_GET['prix_max']))?$_GET['prix_max']:"prix_max"); ?>" />
	<label>Résultat par page :</label><select name="nb_par_page">
		<option value="5" <?php if(!isset($_GET['nb_par_page']) || (isset($_GET['nb_par_page']) && ($_GET['nb_par_page'] == 5 || empty($_GET['nb_par_page'])))) echo "selected=selected" ?>>5</option>
		<option value="10" <?php if(isset($_GET['nb_par_page']) && ($_GET['nb_par_page'] == 10)) echo "selected=selected" ?>>10</option>
		<option value="15" <?php if(isset($_GET['nb_par_page']) && ($_GET['nb_par_page'] == 15)) echo "selected=selected" ?>>15</option>
		<option value="20" <?php if(isset($_GET['nb_par_page']) && ($_GET['nb_par_page'] == 20)) echo "selected=selected" ?>>20</option>
		<option value="50" <?php if(isset($_GET['nb_par_page']) && ($_GET['nb_par_page'] == 50)) echo "selected=selected" ?>>50</option>
	</select>
	<input type="hidden" name="noPage" id="noPage" value="<?php if(isset($_GET['noPage']) && is_numeric($_GET['noPage'])) echo $_GET['noPage']; else echo "1"; ?>" />
	<input type="hidden" name="rechercher" id="rechercher" value="<?php if(isset($_GET['rechercher'])) echo $_GET['rechercher']; else echo ""; ?>" />
	<br />
	<input onClick="$('#noPage').val('1');" type="submit" name="submitForm" VALUE="rechercher !" /><br />
<?php
	if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] != "/search.php")
	{
		if(!isset($_GET['surface_min']))
			$_GET['surface_min']='';
		if(!isset($_GET['surface_max']))
			$_GET['surface_max']='';
		if(!isset($_GET['nb_piece_min']))
			$_GET['nb_piece_min']='';
		if(!isset($_GET['nb_piece_max']))
			$_GET['nb_piece_max']='';
		if(!isset($_GET['prix_min']))
			$_GET['prix_min']='';
		if(!isset($_GET['prix_max']))
			$_GET['prix_max']='';
		if(!isset($_GET['cp']))
			$_GET['cp']='';
		/*
		echo "<br />";
		echo "<br />";
		echo "<br />";
		print_r($_GET);
		echo "<br />";
		echo "<br />";
		echo "<br />";
		*/
		if(!isset($_GET['surface_min']) || !($_GET['surface_min'] == "surface_min" || empty($_GET['surface_min']) || is_numeric($_GET['surface_min'])))
			die("error on surface_min");
		if(!isset($_GET['surface_max']) || !($_GET['surface_max'] == "surface_max" || empty($_GET['surface_max']) || is_numeric($_GET['surface_max'])))
			die("error on surface_max");	
		if(!isset($_GET['nb_piece_min']) || !($_GET['nb_piece_min'] == "nb_piece_min" || empty($_GET['nb_piece_min']) || is_numeric($_GET['nb_piece_min'])))
			die("error on nb_piece_min");	
		if(!isset($_GET['nb_piece_max']) || !($_GET['nb_piece_max'] == "nb_piece_max" || empty($_GET['nb_piece_max']) || is_numeric($_GET['nb_piece_max'])))
			die("error on nb_piece_max");	
		if(!isset($_GET['cp']) || !($_GET['cp'] == "cp" || empty($_GET['cp']) || is_numeric($_GET['cp'])))
			die("error on cp");
		if(!isset($_GET['prix_min']) || !($_GET['prix_min'] == "prix_min" || empty($_GET['prix_min']) || is_numeric($_GET['prix_min'])))
			die("error on prix_min");
		if(!isset($_GET['prix_max']) || !($_GET['prix_max'] == "prix_max" || empty($_GET['prix_max']) || is_numeric($_GET['prix_max'])))
			die("error on prix_max");
		
		
		if(isset($_GET['nb_par_page']) && is_numeric($_GET['nb_par_page']))
			$nbParPage = $_GET['nb_par_page'];
		else
			$nbParPage = 5;
		if(isset($_GET['noPage']) && is_numeric($_GET['noPage']))
			$noPage = $_GET['noPage']-1;
		else
			$noPage = 0;
		if(isset($_GET['surface_min']) && $_GET['surface_min'] == "surface_min" || empty($_GET['surface_min']))
			$surface_min=0;		
		else
			$surface_min=$_GET['surface_min'];
		if(isset($_GET['surface_max']) && $_GET['surface_max'] == "surface_max" || empty($_GET['surface_max']))
			$surface_max=999999;
		else
			$surface_max=$_GET['surface_max'];
		if(isset($_GET['nb_piece_min']) && $_GET['nb_piece_min'] == "nb_piece_min" || empty($_GET['nb_piece_min']))
			$nb_piece_min=0;
		else
			$nb_piece_min=$_GET['nb_piece_min'];
		if(isset($_GET['nb_piece_max']) && $_GET['nb_piece_max'] == "nb_piece_max" || empty($_GET['nb_piece_max']))
			$nb_piece_max=999999;
		else
			$nb_piece_max=$_GET['nb_piece_max'];
		if(isset($_GET['prix_min']) && $_GET['prix_min'] == "prix_min" || empty($_GET['prix_min']))
			$prix_min=0;
		else
			$prix_min=$_GET['prix_min'];
		if(isset($_GET['prix_max']) && $_GET['prix_max'] == "prix_max" || empty($_GET['prix_max']))
			$prix_max=9999999999;
		else
			$prix_max=$_GET['prix_max'];
		if(isset($_GET['cp']) && $_GET['cp'] == "00000" || empty($_GET['cp']))
			$cp='00000';
		else
			$cp=$_GET['cp'];
		
		if(isset($_GET['rechercher']) AND !empty($_GET['rechercher'])){
			$recherche = $_GET['rechercher'];
		}
		else
			$recherche='';
		
		$offsetBiens = $noPage*$nbParPage;
		/*echo "<br /><br /><br />SELECT categorie.libelle as catlib, biens.id_b as id_b, biens.nb_pieces as nb_pieces, biens.prix as prix,
					biens.surface as surface,biens.date as date, biens.description as description, adresse.cp as cp, adresse.ville as ville 
			FROM biens, adresse, categorie 
			WHERE biens.id_adr=adresse.id_adr 
			  and categorie.id_cat=biens.id_cat
			  AND biens.nb_pieces >= '$nb_piece_min' AND biens.nb_pieces <= '$nb_piece_max' 
			  AND biens.surface >= '$surface_min' AND biens.surface <= '$surface_max' 
			  AND (adresse.cp = '$cp' OR '$cp' = '00000')
			  AND biens.prix >= '$prix_min' AND biens.prix <= '$prix_max'
			  LIMIT $offsetBiens, $nbParPage<br /><br /><br />";*/
		$sql = "SELECT count(1) as cpt
			FROM biens, adresse, categorie 
			WHERE biens.id_adr=adresse.id_adr 
			  and categorie.id_cat=biens.id_cat
			  AND biens.nb_pieces >= '$nb_piece_min' AND biens.nb_pieces <= '$nb_piece_max' 
			  AND biens.surface >= '$surface_min' AND biens.surface <= '$surface_max' 
			  AND (adresse.cp = '$cp' OR '$cp' = '00000')
			  AND biens.prix >= '$prix_min' AND biens.prix <= '$prix_max'
			  AND (
					(UPPER(adresse.RUE) LIKE UPPER('%$recherche%') OR UPPER(adresse.CP) LIKE UPPER('%$recherche%') OR UPPER(adresse.VILLE) LIKE UPPER('%$recherche%')) 
				 OR (UPPER(biens.DESCRIPTION) LIKE UPPER('%$recherche%'))
			  )";
		$cptResult = $bdd->query($sql);
		$cptAnnonces = $cptResult->fetch()->cpt;
	$sql = "SELECT categorie.libelle as catlib, biens.id_b as id_b, biens.nb_pieces as nb_pieces, biens.prix as prix,
					biens.surface as surface,biens.date as date, biens.description as description, adresse.cp as cp, adresse.ville as ville 
			FROM biens, adresse, categorie 
			WHERE biens.id_adr=adresse.id_adr 
			  and categorie.id_cat=biens.id_cat
			  AND biens.nb_pieces >= '$nb_piece_min' AND biens.nb_pieces <= '$nb_piece_max' 
			  AND biens.surface >= '$surface_min' AND biens.surface <= '$surface_max' 
			  AND (adresse.cp = '$cp' OR '$cp' = '00000')
			  AND biens.prix >= '$prix_min' AND biens.prix <= '$prix_max'
			  AND (
					(UPPER(adresse.RUE) LIKE UPPER('%$recherche%') OR UPPER(adresse.CP) LIKE UPPER('%$recherche%') OR UPPER(adresse.VILLE) LIKE UPPER('%$recherche%')) 
				 OR (UPPER(biens.DESCRIPTION) LIKE UPPER('%$recherche%'))
			  )
			  LIMIT $offsetBiens, $nbParPage";
		//echo $sql;
	
		$listeAnnonces = $bdd->query($sql);
		//print_r($listeAnnonces);

			
			$rowCount = 0;
			while($annonce = $listeAnnonces->fetch()){
				if($rowCount == 0)
					echo "<table border=1><th>preview</th><th>Type</th><th>Ville</th><th>surface (m²)</th><th>Nombre de pièces</th><th>Description</th><th>Date</th><th>Prix</th>";
				$rowCount++;
				echo "<tr>";
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
				echo '<td>'.$annonce->date.'</td>';
				echo '<td>'.$formatter->formatCurrency($annonce->prix, 'EUR').'</td>';
				echo '<tr />';
			}
			$listeAnnonces->closeCursor();
			
		if($rowCount > 0){
			echo "</table>";
			for($i=0; $i*$nbParPage < $cptAnnonces; $i++){
				echo "<span ";
				if($i != $noPage)
					echo "style=\"cursor:pointer;\" onClick=\"$('#submitForm').val('sent');$('#noPage').val('".($i+1)."');$('#searchBiens').submit();\"";
				echo ">".($i+1)."</span> ";
			}
		}
		else
			echo "No MATCH FOUND !<br />";
			
	}
	?>
	
</form>
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
	
<?php
require("include/footer.php");
?>