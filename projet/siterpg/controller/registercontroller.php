<?php

require dirname(__FILE__).'/../model/registermodel.php';

$submit = "";
$name = "";
$lastname = "";
$Email = "";
$Mdp = "";
$birthdate = "";
$username = "";

if(isset($_POST['submit']))
{
  $Mdp = sha1($_POST['Mdp']);
  $Email = $_POST['Email'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $birthdate = $_POST['birthdate'];
  $submit = $_POST['submit'];

              //<!-- Gestion du name : -->
              if ((!isset($name) || empty($name)) && ($submit <> ""))
              {
              echo "<font color='#FF0000'> Le name DOIT être rempli :</font><BR>";
              }

          //echo "Votre name : <input type=\"text\" name=\"name\" value=\"";
          // if(isFilledField($name)){}
          //     echo $name;
          // echo "\"/><br>";


          //<!-- Gestion du Préname : -->

            if ((!isset($lastname)|| empty($lastname)) && ($submit <> "")){
              echo "<font color='#FF0000'> Le préname DOIT être rempli :</font><BR>";
            }

          //echo "Votre préname : <input type=\"text\" name=\"lastname\" value=\"";
          // if(isFilledField($lastname)){}
          //   echo $lastname;
          //   echo "\"/> <br> ";

          //<!-- Gestion de l'E-Mail : -->

            if ((!isset($Email)|| empty($Email)) && ($submit <> "")){
              echo "<font color='#FF0000'> L'E-Mail DOIT être rempli :</font><BR>";
            }

          //echo "Votre E-Mail : <input type=\"text\" name=\"Email\" value=\"";
          // if(isFilledField($Email)){}
          //   echo $Email;
          //   echo "\"/> <br>";

          //<!-- Gestion de la date de naissance : -->

          if ((!isset($birthdate)|| empty($birthdate)) && ($submit <> "")){
            echo "<font color='#FF0000'> La date de naissance DOIT être rempli :</font><BR>";
          }

          //<!-- Gestion du pseudo : -->

          if ((!isset($username)|| empty($username)) && ($submit <> "")){
            echo "<font color='#FF0000'> Le pseudo DOIT être rempli :</font><BR>";
          }

          //<!-- Gestion du mdp : -->

            if ((!isset($Mdp)|| empty($Mdp)) && ($submit <> "")){
              echo "<font color='#FF0000'> Le mot de passe DOIT être rempli :</font><BR>";
              }
          //echo "Votre mot de passe : <input type=\"password\" name=\"Mdp\" value=\"\"/> <br>";
      }
    
?>
