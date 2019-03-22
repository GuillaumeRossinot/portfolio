<?php require("include/header.php");

function checkDatePattern($dateSelected)
{
    if (empty($dateSelected)) return false;
    $nbElem = explode("-", $dateSelected);
		
    return true;
}

function test(){
	return false;
}
if (!isset($_SESSION['lvl']) ||($_SESSION['lvl'] >2)){ 
header( "refresh:5;url=index.php" );
die("Vous ne pouvez pas accéder à cette page en tant qu'acheteur");}

if(isset($_POST['submit']) && !empty($_POST['submit']))
{
//echo $_POST['date']; 
//echo '<br />';
//echo datefrenus($_POST['date']);
	echo "<div id=\"result\"  style=\"clear:both;margin-left: 273px;
					margin-top: 50px;
					float: left;
					width: 70%;
					border: 1px solid black;
					background-color: #DDDDDD;\"/>";
	
	if(!isset($_POST['nb_piece']) || empty($_POST['nb_piece'])){
		die("nb de pièce invalide");
	}
	if(!isset($_POST['surface']) || empty($_POST['surface'])){
		die("surface invalide");
	}
		if(!isset($_POST['prix']) || empty($_POST['prix'])){
		die("prix invalide");
	}
	if(!isset($_POST['No']) || empty($_POST['No']) || !is_numeric($_POST['No']) 
		|| !isset($_POST['rue']) || empty($_POST['rue']) //|| !ctype_alnum($_POST['rue'])
		|| !isset($_POST['cp']) || empty($_POST['cp'] || !is_numeric($_POST['cp']) ) 
		|| !isset($_POST['ville']) || empty($_POST['ville']) //|| !ctype_alnum($_POST['ville'])
		){
		die("Adresse invalide");
	}
	if(isset($_POST['description']) && !empty($_POST['description']))
	{
			if($_POST['description'] == "Description du bien ..."){
				die("Description invalide");
			}
	}else
	{
		die("Description invalide");
	}
	
	if(!isset($_POST['type']) || empty($_POST['type']) || !is_numeric($_POST['type']) ){
		die("catégorie invalide");
	}


	
	//echo "contols passed<br/>";
	$id_u=$_SESSION['id_u'];
	$numero=$_POST['No'];
	$rue=$_POST['rue'];
	$cp=$_POST['cp'];
	$ville=$_POST['ville'];
	$description=addslashes($_POST['description']);
	$nb_pieces=$_POST['nb_piece'];
	$surface=$_POST['surface'];
	$idCat=$_POST['type'];
	$prix=$_POST['prix'];
	$date=$_POST['date'];
	
	if(!checkDatePattern($date))
		$date=date("Y-m-d");
	
	//echo "select numero, rue, cp, ville from adresse where numero=$numero and rue=$rue and cp=$cp and ville=$ville"."<br />";
	$query = $bdd->prepare("select id_adr from adresse where numero='$numero' and rue='$rue' and cp='$cp' and ville='$ville'");
	$query->execute();
	$count = $query->rowCount();
	if($count == 0){
		//echo "INSERT INTO adresse (numero, rue, cp, ville) VALUES('$numero','$rue','$cp','$ville')"."<br />";
		$query = $bdd->query("INSERT INTO adresse (numero, rue, cp, ville) VALUES('$numero','$rue','$cp','$ville')");
		$idAdress=$bdd->lastInsertId();
	}
	else{
		//echo "l'adresse existe déjà <br />";
		$adresse=$query->fetch(PDO::FETCH_BOTH);
		$idAdress=$adresse['id_adr'];
	}
	if($idAdress == 0)
		die("adress error");
	//echo "id_adresse : ".$idAdress."<br />";
	
	//echo "INSERT INTO biens (nb_pieces, surface, description, id_adr, id_cat) VALUES('$nb_pieces','$surface',''$description'','$idAdress','$idCat')"."<br />";
	$query = $bdd->prepare("INSERT INTO biens (nb_pieces, surface, description, prix, date, id_adr, id_cat, id_u) VALUES('$nb_pieces','$surface','$description','$prix', DATE_FORMAT('$date','%Y-%m-%d'),'$idAdress','$idCat', $id_u)");
	$query->execute();
	$count = $query->rowCount();
	if($count == 0){
		die("error while inserting");
	}
	else{
		$idBien=$bdd->lastInsertId();
	}
	
	//echo "uploading photos"."<br />";
	
	//extract($_POST);
	//print_r($_FILES);
	$error=array();
	$extension=array("jpeg","jpg","png","gif");
	$cptName=0;
	foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
	{
		$cptName++;
		$ext=pathinfo($_FILES["files"]["name"][$key],PATHINFO_EXTENSION);
		$file_name=$idBien."_".$cptName.".".$ext;
		$file_tmp=$_FILES["files"]["tmp_name"][$key];
		
		if(in_array($ext,$extension))
		{
			if(!file_exists("image/uploaded/".$file_name))
			{
				move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"image/uploaded/".$file_name);
			}
			else
			{
				$filename=basename($file_name,$ext);
				$newFileName=$idBien."_".time().".".$ext;
				move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"image/uploaded/".$newFileName);
			}
		}
		else
		{
			array_push($error,"$file_name, ");
		}
	}
	
	$listFiles = glob('image/uploaded/'.$idBien."_*");
	//print_r($listFiles);
	
	if(count($listFiles) != $cptName){
		die("bad picture upload");
	}
	
echo "</div>";
}



?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="/js/jquery-1.12.4.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  
<div id="recherche"  style="clear:both;margin-left: 273px;
	margin-top: 50px;
    float: left;
    border: 1px solid black;
	width: 70%;
	background-color: #DDDDDD">
<h2> Recherche </h2>

<p>
<form method=POST action="" enctype="multipart/form-data">
	<label>Capacité</label><br/>
	Nombre de pièce : <input type="text" name="nb_piece" value="Nombre de pièce" /><br />
	Surface : <input type="text" name="surface" value="Taille en m²" /><br/><br/>
	Prix : <input type="text" name="prix" value="Prix du bien" /><br/><br/>
	Type de bien : <select name="type" id="type">
           <option value="1">Maison</option>
           <option value="2">Appartement</option>
       </select><br />
	<label>Adresse</label><br/>
	N° rue <input type="text" name="No" value="N° rue" />
	Rue <input type="text" name="rue" value="Nom rue" /><br/><br/>
	CP <input type="text" name="cp" value="Code postal" />
	Ville <input type="text" name="ville" value="Ville" /><br/><br/>
	Date <input type="text" name="date" id="datepicker"><br />
	<label>Description</label><br/>
	<textarea name="description"rows=10 cols=100>Description du bien ...</textarea>
	<br/><br/>
	<input type="file" name="files[]" multiple> Note: Supported image format: .jpeg, .jpg, .png, .gif <br />
	<input type="submit" name="submit" value="Envoyer !" />
	<input type="reset" value="Reset !" />
	
</form>
</p>
</div>
<?php require("include/footer.php")?>