<?php

session_start();

$titre="Voir un forum";

include("includes/functions.php");

include("includes/debut.php");

include("includes/menu.php");


//On récupère la valeur de f

$forum = (int) $_GET['f'];


//A partir d'ici, on va compter le nombre de messages

//pour n'afficher que les 25 premiers

$query=$db->prepare('SELECT forum_name, forum_topic, auth_view, auth_topic FROM forum_forum WHERE forum_id = :forum');

$query->bindValue(':forum',$forum,PDO::PARAM_INT);

$query->execute();

$data=$query->fetch();


$totalDesMessages = $data['forum_topic'] + 1;

$nombreDeMessagesParPage = 25;

$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);

?>