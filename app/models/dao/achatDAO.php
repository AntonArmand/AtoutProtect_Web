<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class AchatDAO {

  private static $connexion; 
  // Objet de connexion
  
  private static function get_connexion() {
    if (self::$connexion === null) {
      // Récupération des paramètres de configuration BD
      $user = 'aprotect';
      $pass = 'rpi-projet';
      $host = '';
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

  function findByIdAchat($idAchat) {
    $sql = "SELECT * FROM achat WHERE idAchat=:idAchat";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idAchat" => $idAchat));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $achat = new Achat($row);

    return $achat;    
    // Retourne un tableau d'objets
  }


  function findAllAchat() {
    $sql = "SELECT * FROM achat";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $achat = new Achat($row);
      
      $tableau[] = $achat;
    }
    return $tableau; 
    // Retourne un tableau d'objets
  }


  function insertAchat($idAchat) {
    $sql = 'INSERT INTO achat(idAchat) VALUES (:idAchat)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":idAchat"             =>$idAchat
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requete SQL : " . $e->getMessage());
    }
    
      return $sth;
  }


  function updateAchat($idAchat) {
  $sql = "UPDATE achat SET idAchat = :idAchat WHERE idAchat=:idAchat ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
        ":idAchat"               =>$idAchat
        ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  
    // Retourne le nombre d'insertion
  }




  function deleteAchat($idAchat) {
    $sql = "DELETE FROM ACHAT WHERE idAchat =:idAchat ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idAchat" => $idAchat));
   
  }


}























