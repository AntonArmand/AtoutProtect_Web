<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class HipassDAO {

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
  
  function findByIdHipass($idHipass) {
    $sql = "SELECT * FROM HIPASS WHERE idHipass=:idHipass";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idHipass" => $idHipass));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $hipass = new HiPass($row);

    return $hipass;    
    // Retourne un tableau d'objets
  }


  function findAllHipass() {
    $sql = "SELECT * FROM HIPASS";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $hipass = new HiPass($row);
      
      $tableau[] = $hipass;
    }
    return $tableau; 
    // Retourne un tableau d'objets
  }


  function insertHipass($idHipass) {
    $sql = 'INSERT INTO HIPASS(idHipass) VALUES (:idHipass)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":idHipass"             =>$idHipass
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    
      return $sth;
  }


  function updateHipass($idHipass) {
  $sql = "UPDATE HIPASS SET idHipass = :idHipass WHERE idHipass=:idHipass ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
        ":idHipass"               =>$idHipass
        ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  
    // Retourne le nombre d'insertion
  }




  function deleteHipass($idHipass) {
    $sql = "DELETE FROM HIPASS WHERE idHipass =:idHipass ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idHipass" => $idHipass));
   
  }


}























