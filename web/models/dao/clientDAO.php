<?php
include_once '/includes/bdd/connect.php';
include_once '../achatModel.php';

class ClientDAO {

  private static $connexion; 
  // Objet de connexion
  

  function findByIdClient($idClient) {
    $sql = "SELECT * FROM CLIENT WHERE idClient=:idClient";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idClient" => $idClient));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

        $client = new Client($row);

    return $client;    
    // Retourne un tableau d'objets
  }


  function findAllClient() {
    $sql = "SELECT * FROM CLIENT";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute();
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $tableau = array();
   
    foreach ($rows as $row) {
      $client = new Client($row);
      
      $tableau[] = $client;
    }
    return $tableau; 
    // Retourne un tableau d'objets
  }


  function insertClient($idClient, $nomClient, $prenomClient, $mailClient, $mdpClient, $dateInscriptionClient) {
    $sql = 'INSERT INTO CLIENT(idClient, nomClient, prenomClient, mailClient, mdpClient, dateInscriptionClient) VALUES (:idClient, :nomClient,:prenomClient, :mailClient, :mdpClient, :dateInscriptionClient)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":idClient"             =>$idClient,
        ":nomClient"            =>$nomClient,      
        ":prenomClient"         =>$prenomClient,
        ":mailClient"           =>$mailClient,
        ":mdpClient"            =>$mdpClient,
        "dateInscriptionClient" =>$dateInscriptionClient
      ));
    
  } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    
      return $sth;
  }


  function updateClient($idClient, $nomClient, $prenomClient, $mailClient, $mdpClient, $dateInscriptionClient) {
  $sql = "UPDATE CLIENT SET idClient = :idClient, nomClient = :nomClient, prenomClient = :prenomClient, mailClient = :mailClient, mdpClient = :mdpClient, dateInscriptionClient= :dateInscriptionClient WHERE idClient=:idClient ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      var_dump($sth);
      $sth->execute(array(
        ":idClient"               =>$idClient,
        ":nomClient"              =>$nomClient,
        ":prenomClient"           =>$prenomClient,
        ":mailClient"             =>$mailClient,
        ":mdpClient"              =>$mdpClient,
        ":dateInscriptionClient"  =>$dateInscriptionClient,

        ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  
    // Retourne le nombre d'insertion
  }




  function deleteClient($idClient) {
    $sql = "DELETE FROM CLIENT WHERE idClient =:idClient ";
  
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":idClient" => $idClient));
   
  }


}























