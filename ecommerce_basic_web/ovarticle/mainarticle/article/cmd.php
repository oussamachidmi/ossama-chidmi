<?php 
include_once("../connexiondb.php");
  if(isset($_POST["avis"])){
      $req="insert into client(ShipCity) values (".$_POST["avis"].")";
      $sth=$cnx->query($req);
  }
?>