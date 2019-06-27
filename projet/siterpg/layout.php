<?php
//require("model/model.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="view/CSS/style.css" media="all"/>
</head>
<header>
<title><?php echo $title;?></title>
 <!--Header-->
 			<!-- Banniere -->

 <!-- <img src="./Images/banniere.png" > -->

  <!-- Ecrire tout le header içi-->
  <nav  id="menu-accueil">
      <ul>
        <li><a href="?p=accueil">Accueil</a></li></li>
        <li><a href="?p=news">Actualité</a></li>
        <li><a href="?p=media">Média</a>
          <ul>
            <li><a href="?p=conceptart">Concept art</a></li>
            <li><a href="?p=video">Vidéo</a></li>
            <li><a href="?p=screenshot">Screenshot</a></li>
            <li><a href="?p=wallpaper">Fond d'écran</a></li>
          </ul>
        </li><!--
      --><li><a href="?p=community">Communauté</a>
          <ul>
            <li><a href="./forum/forumview.php">Forum</a></li>
          </ul>
        </li>
        <li><a href="?p=jeu">Jeu</a>
          <ul>
            <li><a href="?p=story">Histoire</a></li>
            <li><a href="?p=race">Races</a>
              <ul>
                <li><a href="?p=race1">Race 1</a></li>
                <li><a href="?p=race2">Race 2</a></li>
                <li><a href="?p=race3">Race 3</a></li>
                <li><a href="?p=race4">Race 4</a></li>
                <li><a href="?p=race5">Race 5</a></li>
                <li><a href="?p=race6">Race 6</a></li>
                <li><a href="?p=race7">Race 7</a></li>
                <li><a href="?p=race8">Race 8</a></li>
                <li><a href="?p=race9">Race 9</a></li>
                <li><a href="?p=race10">Race 10</a></li>
              </ul>
            </li>
            <li><a href="?p=classe">Classes</a>
            <ul>
                <li><a href="?p=classe1">Classe 1</a>
                </li>
                <li><a href="?p=classe2">Classe 2</a>
                </li>
                <li><a href="?p=classe3">Classe 3</a>
                </li>
                <li><a href="?p=classe4">Classe 4</a>
                </li>
            </ul>
            </li>
            <li><a href="?p=help">Aide</a>
              <ul>
                  <li><a href="?p=wiki">Wiki</a></li>
                  <li><a href="?p=database">Base de données</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="?p=support">Support</a></li>
        <?php if(isset ($_SESSION ['connecte']))
            {
              $id_u = $_SESSION['id'];
              $lvl = $_SESSION['lvl'];?>
              <li><a href="?p=myaccount">Mon compte</a></li>
              <li><a href="?p=logout">Deconnexion</a></li>
              <?php
              if($lvl == 1)// si admin affiche Administration
              {
              //print_r($_SESSION);
                ?>
                <li><a href="?p=admin">Administration</a></li>
            <?php	}
            }
            else
            { ?>
              <li><a href="?p=login">Connexion</a></li>
              <li><a href="?p=register"> Inscription</a></li>
        <?php    } ?>
      </ul>
    </nav>
 </header>


  <body>
   <!--ne pas modifier cette partie-->
	<?= $content ?>
  </body>

<footer>
  			<!-- footer -->
<h3> footer </h3>
    <h4>Pages du site</h4>
    <ul>
        <li>Accueil</li>
        <li>Actualités</li>
        <li>Média</li>
        <li>Communauté</li>
        <li>Jeu</li>
        <li>Support</li>
        <li>Connexion / Inscription</li>
    </ul>

	  <!-- Ecrire tout le footer içi-->
    <div id="copyrigth">
	  Copyrigth "Webmaster".
  </div>
  </footer>
</html>
