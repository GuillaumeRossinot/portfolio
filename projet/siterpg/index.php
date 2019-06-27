<?php
session_start ();

	if(!isset($_GET['p']))
	{
		$page = "accueil" ;

	}
	else
	{
		if(!file_exists("view/".$_GET['p']."view.php")){

		$page = "404";
		}
		else
		{
		$page = $_GET['p'];
		}
	}

	ob_start();
	include "./view/".$page."view.php" ;
	$content = ob_get_contents();
	ob_end_clean();
	include "layout.php";
?>
