<?php
require "config.php";

try
{
$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
