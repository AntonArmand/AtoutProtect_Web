<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class PaypalDAO {

  private static $connexion; 
  // Objet de connexion
  

  private static function get_connexion() {
    if (self::$connexion === null) {
      // Récupération des paramètres de configuration BD
      $user = 'root';
      $pass = '';
      $host = 'localhost';
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
  
  function findByIdPaypal($idPaypal) {
    $sql = "SELECT * FROM PAYPAL WHERE idPaypal=:idPaypal";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idPaypal" => $idPaypal));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $hipass = new HiPass($row);

    return $hipass;    
    // Retourne un tableau d'objets
  }


  function findAllPaypal() {
    $sql = "SELECT * FROM PAYPAL";
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


  function insertPaypal($idPaypal) {
    $sql = 'INSERT INTO PAYPAL(idPaypal) VALUES (:idPaypal)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":idPaypal"             =>$idPaypal
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    
      return $sth;
  }


  function updatePaypal($idPaypal) {
  $sql = "UPDATE PAYPAL SET idPaypal = :idPaypal WHERE idPaypal=:idPaypal ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
        ":idPaypal"               =>$idPaypal
        ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  
    // Retourne le nombre d'insertion
  }




  function deletePaypal($idPaypal) {
    $sql = "DELETE FROM PAYPAL WHERE idPaypal =:idPaypal ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idPaypal" => $idPaypal));
   
  }


}























