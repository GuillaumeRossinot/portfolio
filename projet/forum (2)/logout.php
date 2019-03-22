<?php
	session_start();
	session_destroy();
	header("location:index.php");


if (isset ($_COOKIE['pseudo']))

{

setcookie('pseudo', '', -1);

}

session_destroy();

?>