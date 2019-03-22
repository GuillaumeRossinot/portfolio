<?php require("include/header.php");
if($_SESSION['lvl'] != 1)
	die("not authorized !");

	


if(isset($_POST['action']) && !empty($_POST['action'])){
	if(isset($_POST['adr_id']) && !empty($_POST['adr_id'])){
		if(!is_numeric($_POST['adr_id']))
			die("id_adr incorrect !");
	}
	
	$action=$_POST['action'];

		
	if($action!="ajouter")
		$adrId=$_POST['adr_id'];
		
	if(isset($_POST['numero']) && !empty($_POST['numero']) && is_numeric($_POST['numero']))
		$numero=$_POST['numero'];
	else
		die("numero incorrect");
	
	if(isset($_POST['rue']) && !empty($_POST['rue']))
		$rue=$_POST['rue'];
	else
		die("rue incorrect");
	
	if(isset($_POST['cp']) && !empty($_POST['cp']) && strlen($_POST['cp']) == 5)
		$cp=$_POST['cp'];
	else
		die("cp incorrect");
	
	if(isset($_POST['ville']) && !empty($_POST['ville']))
		$ville=$_POST['ville'];
	else
		die("ville incorrect");
	
	
	if($action == "modifier"){
		$sql = "UPDATE ADRESSE SET NUMERO='$numero',RUE='$rue',CP='$cp',VILLE='$ville' WHERE ID_ADR='$adrId'";
		//echo $sql;
		$bdd->query($sql);
	}
	else if($action == "supprimer"){
		$sql = "DELETE FROM ADRESSE WHERE ID_ADR='$adrId'";
		//echo $sql;
		$bdd->query($sql);
	}
	else if($action == "ajouter"){
		$sql = "INSERT INTO ADRESSE(numero, rue, cp, ville) VALUES('$numero','$rue','$cp','$ville')";
		//echo $sql;
		$bdd->query($sql);
	}

}

?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>

<div id="recherche">
<h2> Adresses </h2>
<table>
<th>ID</th><th>N°</th><th>Rue</th><th>Code Postal</th><th>Ville</th>
<?php


	$sql="select * from adresse;";
	$listAdr = $bdd->query($sql);
	
	while($adr = $listAdr->fetch()){
		echo '<form name="adr_'.$adr->id_adr.'" method=POST action=""><tr>';
		echo '<input type="hidden" name="adr_id" value="'.$adr->id_adr.'" /><td>'.$adr->id_adr.'</td>';
		echo '<td><input type="text" name="numero" value="'.$adr->numero.'" /></td>';
		echo '<td><input type="text" name="rue" value="'.$adr->rue.'" /></td>';
		echo '<td><input type="text" name="cp" value="'.$adr->cp.'" /></td>';
		echo '<td><input type="text" name="ville" value="'.$adr->ville.'" /></td>';
		echo '<td><input type="submit" name="action" value="modifier" />&nbsp;&nbsp;&nbsp;
				<input type="submit" name="action" value="supprimer" /></td>';
		echo '</tr></form>';
	}
	echo '</table>';
	echo "<h2>Ajouter adresse</h2>";
	
	echo '<table><th>N°</th><th>Rue</th><th>Code Postal</th><th>Ville</th><tr>';
	echo '<form name="adr_new" method=POST action=""><tr>';
	echo '<td><input type="text" name="numero" value="numero" /></td>';
	echo '<td><input type="text" name="rue" value="rue" /></td>';
	echo '<td><input type="text" name="cp" value="cp" /></td>';
	echo '<td><input type="text" name="ville" value="ville" /></td>';
	echo '<td><input type="submit" name="action" value="ajouter" />';
	echo '</tr></form></table>';
?>
</div>

<?php require("include/footer.php")?>