<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class LicenceDAO {

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
  
  function findByCodeLicence($codeLicence) {
    $sql = "SELECT * FROM licence WHERE codeLicence=:codeLicence";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":codeLicence" => $codeLicence));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $licence = new Licence($row);

    return $licence;    
    // Retourne un tableau d'objets
  }


  function findAllLicence() {
    $sql = "SELECT * FROM licence";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $licence = new Licence($row);
      
      $tableau[] = $licence;
    }
    return $tableau; 
    // Retourne un tableau d'objets
  }


  function insertLicence($codeLicence, $dateAchat, $dateExpiration, $idActivation) {
    $sql = 'INSERT INTO licence(codeLicence, dateAchat, dateExpiration, idActivation) VALUES (:codeLicence, :dateAchat, :dateExpiration, :idActivation)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":codeLicence"       =>$codeLicence,
        ":dateAchat"         =>$dateAchat,
        ":dateExpiration"    =>$dateExpiration,
        ":idActivation"    =>$idActivation
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
      return $sth;
  }


  function updateLicence($codeLicence) {
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
  }




  function deleteLicence($codeLicence) {
    $sql = "DELETE FROM licence WHERE codeLicence =:codeLicence ";
      try{

      }
      catch(PDOException $e)
      {
        throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
      }

      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(       
        ":codeLicence"      =>$codeLicence,
        "dateAchat"         =>$dateAchat
        ));
   
  }


}