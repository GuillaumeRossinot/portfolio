<?php require("../include/function.php");?>

<form action="/ajout_projet.php" method="post">
<p>
<h2>ajout projet</h2>
    Nom du projet :<input type="text" name="nomprojet" /> <br/>
	URL du projet :<input type="text" name="url" /><br/>
	Date de fin : <input type="date" name="datefin" /> <br/>
	Description du projet :<textarea name="description" ></textarea><br/>
	Type de projet: <select name="cat">
					    <option value="1">Developpement Web</option>
						<option value="2">Programmation</option>
					</select> <br/>
	   <input type="submit" value="Valider" name="submit"/>
</p>
</form>

<?php 
if(isset($_POST['submit']) && !empty($_POST['submit'])){
	$libelle=$_POST['nomprojet'];
	$date_fin=$_POST['datefin'];
	$url=$_POST['url'];
	$desc=addslashes ($_POST['description']);
	$id_cat=$_POST['cat'];
$sth = $bdd->prepare("INSERT INTO `projets` ( `libelle`, `date_fin`, `url`, `description`, `id_cat`) VALUES ( :nomprojet, :datefin, :url, :description, :cat)");
		$sth->bindParam(':nomprojet', $libelle);
		$sth->bindParam(':datefin', $date_fin);
		$sth->bindParam(':url', $url);
		$sth->bindParam(':description', $desc);
		$sth->bindParam(':cat', $id_cat);
		try
{
$sth->execute();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

}
		?>

<form action="/ajout_projet.php?mdp=P0rtf0li0" method="post">
<p>
<h2>modification projet</h2>
    Nom du projet :<input type="text" name="nomprojet" /> <br/>
	URL du projet :<input type="text" name="url" /><br/>
	Date de fin : <input type="date" name="datefin" /> <br/>
	Description du projet :<textarea name="description" ></textarea><br/>
	Type de projet: <select name="cat">
					    <option value="1">Developpement Web</option>
						<option value="2">Programmation</option>
					</select> <br/>
	   <input type="submit2" value="Valider" name="submit2"/>
</p>
</form>
		
		
<?php 
if(isset($_POST['submit2']) && !empty($_POST['submit2'])){
	$libelle=$_POST['nomprojet'];
	$date_fin=$_POST['datefin'];
	$url=$_POST['url'];
	$desc=addslashes ($_POST['description']);
	$id_cat=$_POST['cat'];
$sth = $bdd->prepare("UPDATE `projets` ( `libelle`, `date_fin`, `url`, `description`, `id_cat`) VALUES ( :nomprojet, :datefin, :url, :description, :cat)");
		$sth->bindParam(':nomprojet', $libelle);
		$sth->bindParam(':datefin', $date_fin);
		$sth->bindParam(':url', $url);
		$sth->bindParam(':description', $desc);
		$sth->bindParam(':cat', $id_cat);
		try
{
$sth->execute();
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

}
		?>