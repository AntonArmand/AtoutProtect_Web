<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class HipassDAO {

  private static $connexion; 
  // Objet de connexion
  

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























