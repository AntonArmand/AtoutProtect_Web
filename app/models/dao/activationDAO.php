<?php
include_once '/includes/bdd/connect.php';
include_once '../activationModel.php';

class ActivationDAO {

  private static $connexion; 
  // Objet de connexion
  
private static function get_connexion() {
    if (self::$connexion === null) {
      // Récupération des paramètres de configuration BD
      $user = 'aprotect';
      $pass = 'rpi-projet';
      $host = '200.150.100.34';
      $base = 'aprotect';
      $dsn = 'mysql:host=' . $host . ';dbname=' . $base;
      // Création de la connexion
      try {
        self::$connexion = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
      }
    }
    return self::$connexion;
  }
  
  
  function insertLicenceDesactived($codeLicence, $status, $biosNumber) {
    $sql = 'INSERT INTO activation(codeLicence, status, biosNumber) VALUES (:codeLicence, :status, :biosNumber)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":codeLicence"       =>$codeLicence,
        ":status"            =>$status,
        ":biosNumber"        =>$biosNumber
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
      return $sth;
  }


  /**function updateLicence($codeLicence) {
  $sql = "UPDATE licence SET codeLicence = :codeLicence WHERE codeLicence=:codeLicence ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
        ":codeLicence"      =>$codeLicence,
        "dateAchat"         =>$dateAchat
        ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  
    // Retourne le nombre d'insertion
  }**/



}