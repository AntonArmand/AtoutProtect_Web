<?php

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
        $licence = new licence($row);
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
      $licence = new licence($row);
      
      $tableau[] = $licence;
    }
    return $tableau; 
    // Retourne un tableau d'objets
  }

    function findAllLicenceByIdClient($idClient) {
    $sql = "SELECT * FROM licence WHERE idClient=:idClient";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idClient" => $idClient));
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
    foreach ($rows as $row) {
      //var_dump($row);
      $licence = new licence($row);
      
      $tableau[] = $licence;
    }
    return $tableau; 
  }


  function insertLicence($codeLicence, $dateAchat, $dateExpiration, $status, $biosNumber, $typeLicence, $idClient) {
    $sql = 'INSERT INTO licence(codeLicence, dateAchat, dateExpiration, status, biosNumber, typeLicence, idClient) VALUES (:codeLicence, :dateAchat, :dateExpiration, :status, :biosNumber, :typeLicence, :idClient)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":codeLicence"       =>$codeLicence,
        ":dateAchat"         =>$dateAchat,
        ":dateExpiration"    =>$dateExpiration,
        ":status"            =>$status,
        ":biosNumber"        =>$biosNumber,
        ":typeLicence"       =>$typeLicence,
        ":idClient"          =>$idClient
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