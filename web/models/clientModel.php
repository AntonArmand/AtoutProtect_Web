<?php

class Client  {
	private $idClient;
  private $nomClient;
  private $prenomClient;
  private $mailClient;
  private $mdpClient;
  private $dateInscriptionClient;
  private $dateModificationClient;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getIdClient() 
  	{
   		return $this->idClient;
  	}
    function getNomClient() 
    {
      return $this->nomClient;
    }

    function getPrenomClient() 
    {
      return $this->prenomClient;
    }

    function getMailClient() 
    {
      return $this->mailClient;
    }

    function getMdpClient() 
    {
      return $this->mdpClient;
    }

     function getDateInscriptionClient() 
    {
      return $this->dateInscriptionClient;
    }
    
    function getDateModificationClient() 
    {
      return $this->dateModificationClient;
    }
    /** GETTER -- END **/

    /** SETTER -- START **/
  	function set_idClient($idClient) 
    {
  	  $this->idClient = $idClient;
  	}

    function set_nomClient($nomClient) 
    {
      $this->nomClient = $nomClient;
    }

    function set_prenomClient($prenomClient) 
    {
      $this->prenomClient = $prenomClient;
    }

    function set_mailClient($mailClient) 
    {
      $this->mailClient = $mailClient;
    }

    function set_mdpClient($mdpClient) 
    {
      $this->mdpClient = $mdpClient;
    }

    function set_dateInscriptionClient($dateInscriptionClient) 
    {
      $this->dateInscriptionClient = $dateInscriptionClient;
    }

    function set_dateModificationClient($dateModificationClient) 
    {
      $this->dateModificationClient = $dateModificationClient;
    }

    /** SETTER -- END **/


  function hydrater(array $tableau) 
  {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}