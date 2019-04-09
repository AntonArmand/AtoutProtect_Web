<?php

class HiPass  {
	private $codeLicence;
  private $dateAchat;


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

    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_CodeLicence($codeLicence) 
    {
      $this->codeLicence = $codeLicence;
    }

    function set_dateAchat($dateAchat) 
    {
      $this->dateAchat = $dateAchat;
    }

  /** SETTER -- END **/


  function hydrater(array $tableau) 
  {
    foreach ($tableau as $cle => $valeur) {
      $methode = 'set' . $cle;
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}