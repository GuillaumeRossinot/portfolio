<?php
require dirname(__FILE__).'/../model/loginmodel.php';


    if(isset($_SESSION['connecte']))
    {
      //print_r ($_SESSION);
      echo"vous etes deja connecter !";
    }
    else
    {
      $reponse = getUserIFExists();
      $_SESSION['id'] = $reponse["id"];
      $_SESSION['email'] = $reponse["email"];
      $_SESSION['lvl'] = $reponse['lvl'];
      $_SESSION['name'] = $reponse['name'];
      $_SESSION['lastname'] = $reponse['lastname'];
      $_SESSION['username'] = $reponse['username'];
    }
