<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class PaypalDAO {

  private static $connexion; 
  // Objet de connexion
  

  function findByIdPaypal($idPaypal) {
    $sql = "select * from paypal where idPaypal=:idPaypal";
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
    $sql = "select * from paypal";
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
    $sql = 'INSERT INTO paypal(idPaypal) VALUES (:idPaypal)';
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
  $sql = "UPDATE hipass SET idPaypal = :idPaypal WHERE idPaypal=:idPaypal ";
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
    $sql = "DELETE FROM hipass WHERE idPaypal =:idPaypal ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idPaypal" => $idPaypal));
   
  }


}























