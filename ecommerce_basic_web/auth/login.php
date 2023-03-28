<?php
session_start();
require_once 'connexiondb.php';

if(isset($_POST['valider']))
{
  $email=$_POST['email'];
$password=$_POST['pass'];
  $res=$cnx->prepare("select * from client where Email=? and Password=? limit 1");
  $res->setFetchMode(PDO::FETCH_ASSOC);
  $res->execute(array($email,$password));
  $tab=$res->fetchAll();
  if(count($tab)==0)
  {
    header('Location:signin.php?login_err=already'); die();
  }
  else
  {
    $_SESSION['autoriser'] = 'oui';
    $_SESSION['user'] = $tab[0]['UserName'];
    header('location:../index2.php');

  }
}

?>

