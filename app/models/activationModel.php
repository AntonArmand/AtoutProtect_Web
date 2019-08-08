<?php

class Activation  {
	private $idActivation;
  private $codeLicence;
  private $status;
  private $biosNumber;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getIdActivation() 
  	{
   		return $this->idActivation;
  	}

    function getCodeLicence() 
    {
      return $this->codeLicence;
    }

    function getStatus() 
    {
      return $this->status;
    }

    function getBiosNumber() 
    {
      return $this->biosNumber;
    }



    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_idActivation($idActivation) 
    {
      $this->idActivation = $idActivation;
    }
    function set_codeLicence($codeLicence) 
    {
      $this->codeLicence = $codeLicence;
    }

    function set_status($status) 
    {
      $this->status = $status;
    }

    function set_biosNumber($biosNumber) 
    {
      $this->biosNumber = $biosNumber;
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