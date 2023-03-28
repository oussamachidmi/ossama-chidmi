<?php

include_once 'connexiondb.php';

if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['pass']) )
    {
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['pass']);


        $check = $cnx->prepare('SELECT UserName, Email, Password FROM client WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email);
   
  

        if($row == 0){ 
          $i=rand(1,10)*10000000;
    
        $sql= "INSERT INTO `client` (`BuyerID`,`Email`,`UserName`, `Password`) VALUES ($i,'$email', '$nom', '$password');";
        $cnx->exec($sql);
        $cnx=NULL;
        header('Location:signup.php?reg_err=success');

      }else{ header('Location: signup.php?reg_err=already'); die();}
    }