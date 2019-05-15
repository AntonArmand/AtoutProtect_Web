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

    function getDateExpiration()
    {
      return $this->dateExpiration;
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

    function set_dateExpiration($codeLicence)
    {
      $this->dateExpiration = $dateExpiration;
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