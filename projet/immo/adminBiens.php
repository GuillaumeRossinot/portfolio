<?php require("include/header.php");
/*if($_SESSION['lvl'] != 1)
	die("not authorized !");*/

	?>
	
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>

<?php


if(isset($_POST['action']) && !empty($_POST['action']) && isset($_POST['id_b']) && !empty($_POST['id_b'])){
	
	if(!is_numeric($_POST['id_b']))
		die("id_b incorrect !");
	
	$action=$_POST['action'];
	$id_bien=$_POST['id_b'];
	
	if(isset($_POST['id_adr']) && !empty($_POST['id_adr']) && is_numeric($_POST['id_adr']))
		$id_adr=$_POST['id_adr'];
	else
		die("adresse incorrect pour le user ".$id_bien);
	
	if(isset($_POST['id_cat']) && !empty($_POST['id_cat']) && is_numeric($_POST['id_cat']))
		$id_cat=$_POST['id_cat'];
	else
		die("catégorie incorrect pour le user ".$id_bien);
	
	if(isset($_POST['nb_pieces']) && !empty($_POST['nb_pieces']) && is_numeric($_POST['nb_pieces']))
		$nb_pieces=$_POST['nb_pieces'];
	else
		die("nb_pieces incorrect pour le user ".$id_bien);
	
	if(isset($_POST['surface']) && !empty($_POST['surface']) && is_numeric($_POST['surface']))
		$surface=$_POST['surface'];
	else
		die("surface incorrect pour le user ".$id_bien);
	
	if(isset($_POST['prix']) && !empty($_POST['prix']) && is_numeric($_POST['prix']))
		$prix=$_POST['prix'];
	else
		die("prix incorrect pour le user ".$id_bien);
	
	if(isset($_POST['description']) && !empty($_POST['description']))
		$description=$_POST['description'];
	else
		die("description incorrecte pour le user ".$id_bien);
	
	if(isset($_POST['date']) && !empty($_POST['date']) && strlen($_POST['date']) == 10
		&& date("Y-m-d", strtotime($_POST['date']))==$_POST['date'])
		
		$date=$_POST['date'];
	else
		die("date incorrect pour le user ".$id_bien);
	
	if($action == "modifier"){
		$sql = "UPDATE BIENS SET id_adr='$id_adr',id_cat='$id_cat',nb_pieces='$nb_pieces',surface='$surface',prix='$prix',date='$date',description='$description' WHERE ID_B='$id_bien' AND (".$_SESSION['lvl']." = 1 OR biens.id_u=".$_SESSION['id_u'].")";
		//echo $sql;
		$bdd->query($sql);
	}
	if($action == "supprimer"){
		$sql = "DELETE FROM BIENS WHERE ID_B='$id_bien'  AND (".$_SESSION['lvl']." = 1 OR biens.id_u=".$_SESSION['id_u'].")";
		//echo $sql;
		$bdd->query($sql);
	}

}

?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>

<link rel="stylesheet" href="/css/jquery-ui.css">
<script src="/js/jquery-1.12.4.js"></script>
<script src="/js/jquery-ui.js"></script>
<script>
$( function() {
$( ".dateBien" ).datepicker({ dateFormat: 'yy-mm-dd' });
} );
</script>

<div id="recherche">
<h2> Biens </h2>
<table>
<th>ID</th><th>Adresse</th><th>Catégorie</th><th>nb_pieces</th><th>surface</th><th>prix</th><th>date</th><th>description</th>
<?php


	$sql="select * from biens WHERE (".$_SESSION['lvl']." = 1 OR biens.id_u=".$_SESSION['id_u'].")";
	$listBiens = $bdd->query($sql);
	
	while($bien = $listBiens->fetch()){
		echo '<form name="bien_'.$bien->id_b.'" method=POST action=""><tr>';
		echo '<input type="hidden" name="id_b" value="'.$bien->id_b.'" /><td>'.$bien->id_b.'</td>';
		
		$sqlAdr="SELECT * FROM ADRESSE";
		$listAdr=$bdd->query($sqlAdr);
		echo '<td><select name="id_adr">';
		while($adr=$listAdr->fetch()){
			echo '<option value="'.$adr->id_adr.'" '.(($adr->id_adr == $bien->id_adr)?"selected=selected":"").'>'.$adr->numero.' '.$adr->rue.' '.$adr->cp.' '.$adr->ville.'</option>';
		}
		echo '</select></td>';
		echo '<input type="hidden" name="id_cat" value="'.$bien->id_cat.'" />';
		
		$sqlCat="SELECT * FROM CATEGORIE";
		$listCat=$bdd->query($sqlCat);
		echo '<td><select name="id_cat">';
		while($cat=$listCat->fetch()){
			echo '<option value="'.$cat->id_cat.'" '.(($cat->id_cat == $bien->id_cat)?"selected=selected":"").'>'.$cat->libelle.'</option>';
		}
		echo '</select></td>';
		
		echo '<td><input type="text" name="nb_pieces" value="'.$bien->nb_pieces.'" /></td>';
		echo '<td><input type="text" name="surface" value="'.$bien->surface.'" /></td>';
		echo '<td><input type="text" name="prix" value="'.$bien->prix.'" /></td>';
		echo '<td><input type="text" name="date" class="dateBien" value="'.$bien->date.'" /></td>';
		echo '<td><textarea name="description" >'.$bien->description.'</textarea></td>';
		echo '<td>';
		$listFiles = glob('image/uploaded/'.$bien->id_b."_*");
		$cpt=0;
		foreach($listFiles as $thisimage){
			$cpt++;
			//
			echo "<a class=\"zoombox zgallery".$bien->id_b."\" href=\"".$thisimage."\"><img style=\"".(($cpt>1)?"display:none;":"")."\" widht=50 height=50 src=\"".$thisimage."\" /></a>";
		}
		if($cpt == 0)
			echo "<a class=\"zoombox zgallery".$bien->id_b."\" href=\"image/NO_PICTURE.jpg\"><img widht=50 height=50 src=\"image/NO_PICTURE.jpg\" /></a>";
		echo '</td>';
		echo '<td><input type="submit" name="action" value="modifier" />&nbsp;&nbsp;&nbsp;
				<input type="submit" name="action" value="supprimer" /></td>';
		echo '</tr></form>';
	}
?>
</table>
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