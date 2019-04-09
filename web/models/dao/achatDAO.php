<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class AchatDAO {

  private static $connexion; 
  // Objet de connexion
  

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
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
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
    $sql = "DELETE FROM achat WHERE idAchat =:idAchat ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idAchat" => $idAchat));
   
  }


}























