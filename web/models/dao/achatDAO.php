<?php

class Achat  {
	private $idAchat;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getIdAchat() 
  	{
   		return $this->idAchat;
  	}

    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_idAchat($idAchat) 
    {
      $this->idAchat = $idAchat;
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