<?php

class licence  {
  private $codeLicence;
  private $dateAchat;
  private $dateExpiration;
  private $status;
  private $biosNumber;
  private $typeLicence;
  private $idClient;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getCodeLicence() 
  	{
   		return $this->codeLicence;
  	}

    function getDateAchat()
    {
      return $this->dateAchat;
    }

    function getDateExpiration()
    {
      return $this->dateExpiration;
    }

    function getStatus()
    {
      return $this->status;
    }

    function getBiosNumber()
    {
      return $this->biosNumber;
    }

    function getTypeLicence()
    {
      return $this->typeLicence;
    }

    function getClientID()
    {
      return $this->idClient;
    }

    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_codeLicence($codeLicence) 
    {
      $this->codeLicence = $codeLicence;
    }

    function set_dateAchat($dateAchat) 
    {
      $this->dateAchat = $dateAchat;
    }
    
    function set_dateExpiration($dateExpiration)
    {
      $this->dateExpiration = $dateExpiration;
    }

    function set_status($status)
    {
      $this->status = $status;
    }   

    function set_biosNumber($biosNumber)
    {
      $this->biosNumber = $biosNumber;
    }   

    function set_typeLicence($typeLicence)
    {
      $this->typeLicence = $typeLicence;
    }   

    function set_idClient($idClient)
    {
      $this->idClient = $idClient;
    }
  /** SETTER -- END **/


  function hydrater(array $tableau) 
  {
    foreach ($tableau as $cle => $valeur) {
      //var_dump($valeur);
      $methode = 'set_' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}