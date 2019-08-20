<?php

class ClientDAO {

// Objet de connexion

private static $connexion;

private static function get_connexion() {
    if (self::$connexion === null) {
      // Récupération des paramètres de configuration BD
      $user = 'aprotect';
      $pass = 'rpi-projet';
      $host = '200.150.100.34';
      $base = 'aprotect';;
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
  
  function findByIdClient($idClient) {
    $sql = "SELECT * FROM client WHERE idClient=:idClient";
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

  function findByEmail($mailClient, $mdpClient) {
    $sql = "SELECT * FROM client WHERE mailClient=:mailClient AND mdpClient=:mdpClient ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":mailClient" => $mailClient,
                          "mdpClient" => $mdpClient
                    ));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    if($row = null)
    {
      echo 'Mot de passe ou identifiant incorrect.';
      return;
    }
    else
    {
      $client = new Client($row);
      return $client;  
    }
  
    // Retourne un tableau d'objets
  }

    function findByEmailOnly($mailClient) {
    $sql = "SELECT * FROM client WHERE mailClient=:mailClient";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(":mailClient" => $mailClient));
      $row = $sth->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }

    if(!$row)
    {
      $client = new Client();
    }
    else
    {
      $client = new Client($row);  
    }

    return current($client);    
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

  function insertClient($nomClient, $prenomClient, $mailClient, $mdpClient, $dateInscriptionClient) {
    $sql = 'INSERT INTO client (nomClient, prenomClient, mailClient, mdpClient, dateInscriptionClient) VALUES (:nomClient,:prenomClient, :mailClient, :mdpClient, :dateInscriptionClient)';
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":nomClient"            =>$nomClient,      
        ":prenomClient"         =>$prenomClient,
        ":mailClient"           =>$mailClient,
        ":mdpClient"            =>hashage($mdpClient),
        "dateInscriptionClient" =>$dateInscriptionClient
      ));

    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    
    return $sth;
  }

  function updateClient($idClient, $nomClient, $prenomClient, $mailClient, $mdpClient, $dateModificationClient) {
    $sql = "UPDATE client SET idClient = :idClient, nomClient = :nomClient, prenomClient = :prenomClient, mailClient = :mailClient, mdpClient = :mdpClient, :dateModificationClient = :dateModificationClient WHERE idClient=:idClient ";
    try {
      $sth = self::get_connexion()->prepare($sql);
      $sth->execute(array(
        ":idClient"               =>$idClient,
        ":nomClient"              =>$nomClient,
        ":prenomClient"           =>$prenomClient,
        ":mailClient"             =>$mailClient,
        ":mdpClient"              =>$mdpClient,
        ":dateModificationClient" =>$dateModificationClient
      ));    
    } catch (PDOException $e) {
      throw new Exception("Erreur lors de la requête SQL : " . $e->getMessage());
    }
    $nb = $sth->rowcount();
    return $nb;  
    // Retourne le nombre d'insertion
  }

  function deleteClient($idClient) {
    $sql = "DELETE FROM client WHERE idClient =:idClient ";

    $sth = self::get_connexion()->prepare($sql);
    $sth->execute(array(":idClient" => $idClient));
  }
}
?>



















