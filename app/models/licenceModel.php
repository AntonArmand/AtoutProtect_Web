<?php

class licence  {
  private $codeLicence;
  private $dateAchat;
  private $dateExpiration;
  private $status;
  private $biosNumber;
  private $clientID;


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
    function getClientID()
    {
      return $this->clientID;
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

    function set_clientID($clientID)
    {
      $this->clientID = $clientID;
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