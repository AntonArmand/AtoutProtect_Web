<?php

class Achat  {
	private $orderID;
  private $name;
  private $idClient;
  private $dateAchat;
  private $amount;


  /** CONSTRUCTEUR **/
  function __construct(array $tableau = null) 
  {
    if (isset($tableau)) {
      $this->hydrater($tableau);
    }
  }

    /** SETTER -- START **/

  	function getOrderID() 
  	{
   		return $this->orderID;
  	}

    function getIdClient() 
    {
      return $this->idClient;
    }

    function getName() 
    {
      return $this->name;
    }

    function getDateAchat() 
    {
      return $this->dateAchat;
    }

    function getAmount() 
    {
      return $this->amount;
    }



    /** GETTER -- END **/

    /** SETTER -- START **/

    function set_orderId($orderID) 
    {
      $this->orderID = $orderID;
    }
    function set_idClient($idClient) 
    {
      $this->idClient = $idClient;
    }

    function set_name($name) 
    {
      $this->name = $name;
    }

    function set_dateAchat($dateAchat) 
    {
      $this->dateAchat = $dateAchat;
    }

    function set_amount($amount) 
    {
      $this->amount = $amount;
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