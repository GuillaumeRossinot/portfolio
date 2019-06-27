<?php $title = "Inscription" ;
require dirname(__FILE__).'/../controller/registercontroller.php'; ?>
<link rel="stylesheet" type="text/css" href="view/CSS/register.css" media="all"/>

<div id="register">

<form method="post" action="<?php dirname(__FILE__).'/?p=register' ?>">

    Votre nom : <input type="text" name="name" value="<?php
    if(isFilledField($name))
        echo $name;?>"><br>

    Votre prénom: <input type="text" name="lastname" value="<?php
      if(isFilledField($lastname))
        echo $lastname;?>"> <br>

    Votre E-Mail : <input type="email" name="Email" value="<?php
      if(isFilledField($Email))
        echo $Email;?>"> <br>

    Votre pseudo : <input type="text" name="username" value="<?php
        if(isFilledField($username))
            echo $username;?>"><br>

    Votre date de naissance : <input type="date" name="birthdate" value="<?php
            if(isFilledField($birthdate))
                echo $birthdate;?>"><br>

    Votre mot de passe : <input type="password" name="Mdp"> <br>


    <input type="submit" name="submit">
  </form>
</div>
