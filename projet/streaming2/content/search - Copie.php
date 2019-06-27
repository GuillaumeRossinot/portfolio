
   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="show-top-grids">
			<div class="col-sm-10 show-grid-left main-grids">

			<?php
			 $formatter = new NumberFormatter('fr_FR',  NumberFormatter::CURRENCY);
			?>

			<div id="exempleannonce">
			<h2>Recherche</h2>
			<form id="searchBiens" method=GET action="" class="ajaxform">
				<label>Titre :</label><input type="text" style="width: 5%;"name="titre" value="<?php echo ((isset($_GET['titre']))?$_GET['titre']:"titre"); ?>" />
				<label>Genre :</label><select name="genre">
					<option value="action et aventure" <?php if(!isset($_GET['aeta']) || (isset($_GET['aeta']) && ($_GET['aeta']))) echo "selected=selected" ?>>Action/Aventure</option>
					<option value="dramatique" <?php if(!isset($_GET['dramatique']) || (isset($_GET['dramatique']) && ($_GET['dramatique']))) echo "selected=selected" ?>>Dramatique</option>
					<option value="animation" <?php if(!isset($_GET['animation']) || (isset($_GET['animation']) && ($_GET['animation']))) echo "selected=selected" ?>>Animation</option>
					<option value="fantastique et science-fiction" <?php if(!isset($_GET['fetsf']) || (isset($_GET['fetsf']) && ($_GET['fetsf']))) echo "selected=selected" ?>>Fantastique et science-fiction</option>
					<option value="historique" <?php if(!isset($_GET['historique']) || (isset($_GET['historique']) && ($_GET['historique']))) echo "selected=selected" ?>>Historique</option>
					<option value="comedie" <?php if(isset($_GET['comedie']) && ($_GET['comedie'])) echo "selected=selected" ?>>Comédie</option>
					<option value="policier et thriller" <?php if(isset($_GET['pett']) && ($_GET['pett'])) echo "selected=selected" ?>>Policières et thrillers</option>
				</select>
				<label>Année:</label><input type="text" style="width: 5%;"name="annee" value="<?php echo ((isset($_GET['annee']))?$_GET['annee']:"annee"); ?>" />
				<label>pays :</label><input type="text" style="width: 5%;"name="pays" value="<?php echo ((isset($_GET['pays']))?$_GET['pays']:"pays"); ?>" />
				<label>Type :</label><select name="type">
					<option value="film" <?php if(!isset($_GET['film']) || (isset($_GET['film']) && ($_GET['film']))) echo "selected=selected" ?>>Film</option>
					<option value="serie" <?php if(isset($_GET['serie']) && ($_GET['serie'])) echo "selected=selected" ?>>Série</option>
				</select>
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
				if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] != "index.php?p=search")
				{
					if(!isset($_GET['titre']))
						$_GET['titre']='';
					if(!isset($_GET['genre']))
						$_GET['genre']='';
					if(!isset($_GET['annee']))
						$_GET['annee']='';
					if(!isset($_GET['pays']))
						$_GET['pays']='';
					if(!isset($_GET['type']))
						$_GET['type']='';
					/*
					echo "<br />";
					echo "<br />";
					echo "<br />";
					print_r($_GET);
					echo "<br />";
					echo "<br />";
					echo "<br />";
					*/
					if(!isset($_GET['titre']) || !($_GET['titre'] == "titre" || empty($_GET['titre'])))
						die("erreur sur le titre");
					if(!isset($_GET['genre']) || !($_GET['genre'] == "genre" || empty($_GET['genre'])))
						die("erreur sur le genre");	
					if(!isset($_GET['annee']) || !($_GET['annee'] == "annee" || empty($_GET['annee']) || is_numeric($_GET['annee'])))
						die("erreur sur l'année");	
					if(!isset($_GET['pays']) || !($_GET['pays'] == "pays" || empty($_GET['pays'])))
						die("erreur sur le pays");	
					if(!isset($_GET['type']) || !($_GET['type'] == "type" || empty($_GET['type'])))
						die("erreur sur le type");
					
					
					if(isset($_GET['nb_par_page']) && is_numeric($_GET['nb_par_page']))
						$nbParPage = $_GET['nb_par_page'];
					else
						$nbParPage = 5;
					if(isset($_GET['noPage']) && is_numeric($_GET['noPage']))
						$noPage = $_GET['noPage']-1;
					else
						$noPage = 0;
					
					if(isset($_GET['titre']) && $_GET['titre'] == "titre" || empty($_GET['titre']))
						$titre="";		
					else
						$titre=$_GET['titre'];
					if(isset($_GET['genre']) && $_GET['genre'] == "genre" || empty($_GET['genre']))
						$genre="";
					else
						$genre=$_GET['genre'];
					if(isset($_GET['annee']) && $_GET['annee'] == "annee" || empty($_GET['annee']))
						$annee="";
					else
						$annee=$_GET['annee'];
					if(isset($_GET['pays']) && $_GET['pays'] == "pays" || empty($_GET['pays']))
						$pays="";
					else
						$pays=$_GET['pays'];
					if(isset($_GET['type']) && $_GET['type'] == "type" || empty($_GET['type']))
						$type="";
					else
						$type=$_GET['type'];
					
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
	<div class="clearfix"> </div>