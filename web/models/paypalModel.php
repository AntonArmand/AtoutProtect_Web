<?php

class Paypal  {
	private $idPaypal;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getIdPaypal() 
  	{
   		return $this->idPaypal;
  	}

    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_idPaypal($idPaypal) 
    {
      $this->idPaypal = $idPaypal;
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