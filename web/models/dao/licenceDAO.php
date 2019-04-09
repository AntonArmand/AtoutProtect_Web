<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class LicenceDAO {

  private static $connexion; 
  // Objet de connexion
  

  function findByCodeLicence($codeLicence) {
    $sql = "SELECT * FROM LICENCE WHERE codeLicence=:codeLicence";
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
    $sql = "SELECT * FROM LICENCE";
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


  function insertLicence($codeLicence) {
    $sql = 'INSERT INTO LICENCE(codeLicence) VALUES (:codeLicence)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":codeLicence"      =>$codeLicence,
        "dateAchat"         =>$dateAchat
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
      return $sth;
  }


  function updateLicence($codeLicence) {
  $sql = "UPDATE LICENCE SET codeLicence = :codeLicence WHERE codeLicence=:codeLicence ";
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
    $sql = "DELETE FROM LICENCE WHERE codeLicence =:codeLicence ";
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























