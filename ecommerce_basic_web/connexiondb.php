<?php
$host = "localhost";
$username = "root";
$password = "";
$db="brechos_data";
$dsn="mysql:host=$host;dbname=$db";

try {
  $cnx = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
  die('erreur' .$e->getMessage());
}
?>