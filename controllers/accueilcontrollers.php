<?php
require dirname(__FILE__).'/../model/accueilmodel.php';

    if(isset ($_SESSION ['connecte']))
    {
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
    }
    
require dirname(__FILE__).'/../views/accueilviews.php';