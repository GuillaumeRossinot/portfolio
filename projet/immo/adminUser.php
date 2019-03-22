<?php require("include/header.php");
if($_SESSION['lvl'] != 1)
	die("not authorized !");

	


if(isset($_POST['action']) && !empty($_POST['action']) && isset($_POST['user_id']) && !empty($_POST['user_id'])){
	
	if(!is_numeric($_POST['user_id']))
		die("user_id incorrect !");
	
	$action=$_POST['action'];
	$userId=$_POST['user_id'];
	
	if(isset($_POST['login']) && !empty($_POST['login']))
		$login=$_POST['login'];
	else
		die("login incorrect pour le user ".$userId);
	
	if(isset($_POST['email']) && !empty($_POST['email']))
		$email=$_POST['email'];
	else
		die("email incorrect pour le user ".$userId);
	
	if(isset($_POST['lvl']) && !empty($_POST['lvl']) && ($_POST['lvl'] <=3 || $_POST['lvl'] >= 1))
		$lvl=$_POST['lvl'];
	else
		die("lvl incorrect pour le user ".$userId);
	
	if(isset($_POST['numtel']) && !empty($_POST['numtel']) && is_numeric($_POST['numtel']) && strlen($_POST['numtel']) == 10)
		$numtel=$_POST['numtel'];
	else
		die("numtel incorrect pour le user ".$userId);
	
	if($action == "modifier"){
		$sql = "UPDATE USERS SET LOGIN='$login', EMAIL='$email', LVL='$lvl', NUMTEL='$numtel' WHERE ID_U='$userId'";
		//echo $sql;
		$bdd->query($sql);
		if($_SESSION['id_u'] == $userId AND $lvl != $_SESSION['lvl'])
			$_SESSION['lvl'] = $lvl;
	}
	if($action == "supprimer"){
		$sql = "DELETE FROM USERS WHERE ID_U='$userId'";
		//echo $sql;
		$bdd->query($sql);
	}

}

?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/zoombox.js"></script>

<div id="recherche">
<h2> Users </h2>
<table>
<th>ID</th><th>login</th><th>email</th><th>lvl</th><th>numtel</th>
<?php


	$sql="select * from users;";
	$listUsers = $bdd->query($sql);
	
	while($user = $listUsers->fetch()){
		echo '<form name="user_'.$user->id_u.'" method=POST action=""><tr>';
		echo '<input type="hidden" name="user_id" value="'.$user->id_u.'" /><td>'.$user->id_u.'</td>';
		echo '<td><input type="text" name="login" value="'.$user->login.'" /></td>';
		echo '<td><input type="text" name="email" value="'.$user->email.'" /></td>';
		echo '<td><select name="lvl"><option '.(($user->lvl == 1 )?" selected ":"").'value="1">admin</option><option '.(($user->lvl == 2 )?" selected ":"").'value="2">Vendeur</option><option '.(($user->lvl == 3 )?" selected ":"").'value="3">acheteur</option></select></td>';
		echo '<td><input type="text" name="numtel" value="'.$user->numtel.'" /></td>';
		echo '<td><input type="submit" name="action" value="modifier" />&nbsp;&nbsp;&nbsp;
				<input type="submit" name="action" value="supprimer" /></td>';
		echo '</tr></form>';
	}
?>
</table>
</div>

<?php require("include/footer.php")?>