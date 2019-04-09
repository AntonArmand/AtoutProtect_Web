<?php

<<<<<<< HEAD
class HiPass  {
	private $codeLicence;
  private $dateAchat;
=======
class Licence  {
  private $codeLicence;
  private $dateAchat;
  private $dateExpiration;
>>>>>>> ec8684505f762bfc1c86750b9fe6ca0ba0c392ce


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

<<<<<<< HEAD
  	function getCodeLicence() 
=======
  	function getCodeLicence()
>>>>>>> ec8684505f762bfc1c86750b9fe6ca0ba0c392ce
  	{
   		return $this->codeLicence;
  	}

    function getDateAchat()
    {
      return $this->dateAchat;
    }

<<<<<<< HEAD
=======
    function getDateExpirations()
    {
      return $this->dateExpiration;
    }

>>>>>>> ec8684505f762bfc1c86750b9fe6ca0ba0c392ce
    /** GETTER -- END **/

    /** SETTER -- START **/

<<<<<<< HEAD
    function set_CodeLicence($codeLicence) 
    {
      $this->codeLicence = $codeLicence;
    }

    function set_dateAchat($dateAchat) 
    {
      $this->dateAchat = $dateAchat;
=======
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
>>>>>>> ec8684505f762bfc1c86750b9fe6ca0ba0c392ce
    }

  /** SETTER -- END **/


  function hydrater(array $tableau) 
  {
    foreach ($tableau as $cle => $valeur) {
<<<<<<< HEAD
      $methode = 'set' . $cle;
=======
      $methode = 'set_' . $cle;
>>>>>>> ec8684505f762bfc1c86750b9fe6ca0ba0c392ce
      if (method_exists($this, $methode)) {
        $this->$methode($valeur);
      }
    }
  }
}