<?php

class Licence  {
  private $codeLicence;
  private $dateAchat;
  private $dateExpiration;


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

    function getDateExpirations()
    {
      return $this->dateExpiration;
    }

    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_CodeLicence($codeLicence)
    {
      $this->$codeLicence;
    }

    function set_DateAchat($dateAchat)
    {
      $this->$dateAchat;
    }

    function set_DateExpirations($dateExpiration)
    {
      $this->$dateExpiration;
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