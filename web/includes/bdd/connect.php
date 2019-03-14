<?php
include_once "credentials.php";

try {
  $con = new PDO($dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die( "<p>Erreur lors de la connexion : " . $e->getMessage() . "</p>");
}

?>