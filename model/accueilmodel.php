<?php

require 'model.php';

    function connecte()
    {
        global $bdd;
        $requete = $bdd->prepare("SELECT * FROM user WHERE id_u = '$id_u'");
        $reponse = $requete->fetch();

        return $reponse;

    }