<?php

class HiPass  {
	private $idHipass;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getIdHipass() 
  	{
   		return $this->idHipass;
  	}

    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_idHipass($idHipass) 
    {
      $this->idHipass = $idHipass;
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