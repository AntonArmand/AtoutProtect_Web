<?php
include_once '../inc/functions.php';
include_once '../models/dao/achatDAO.php';
include_once '../models/achatModel.php';

$oneMonth   = isset($_POST['oneMonth']) ? $_POST['oneMonth'] : '';
$sixMonth   = isset($_POST['sixMonth']) ? $_POST['sixMonth'] : '';
$unlimited  = isset($_POST['unlimited']) ? $_POST['unlimited'] : '';

$date       = new DateTime();
$date       = $date->format('Y-m-d H:i:s');

if($oneMonth)
{
	$orderID	    = isset($_POST['orderID']) ? $_POST['orderID'] : '';
    $idClient   	= isset($_POST['idClient']) ? $_POST['idClient'] : '';
    $dateAchat      = isset($_POST['dateAchat']) ? $_POST['dateAchat '] : '';
    $name  			= isset($_POST['name']) ? $_POST['name'] : '';
    $amount  		= isset($_POST['amount']) ? $_POST['amount'] : '';

    $array = array("orderID" 					=> $orderID,
                        "idClient" 				=> $idClient,
                        "dateAchat" 			=> $dateAchat,
                        "dateInscriptionClient" => $dateInscriptionClient,
                        "name" 					=> $name),
                        "amount" 				=> $amount);


}
else if($sixMonth)
{
	
	$orderID	    = isset($_POST['orderID']) ? $_POST['orderID'] : '';
    $idClient   	= isset($_POST['idClient']) ? $_POST['idClient'] : '';
    $dateAchat      = isset($_POST['dateAchat']) ? $_POST['dateAchat '] : '';
    $name  			= isset($_POST['name']) ? $_POST['name'] : '';
    $amount  		= isset($_POST['amount']) ? $_POST['amount'] : '';

    $array = array("orderID" 					=> $orderID,
                        "idClient" 				=> $idClient,
                        "dateAchat" 			=> $dateAchat,
                        "dateInscriptionClient" => $dateInscriptionClient,
                        "name" 					=> $name),
                        "amount" 				=> $amount);
	
}


else if($unlimited)
{
	
	$orderID	    = isset($_POST['orderID']) ? $_POST['orderID'] : '';
    $idClient   	= isset($_POST['idClient']) ? $_POST['idClient'] : '';
    $dateAchat      = isset($_POST['dateAchat']) ? $_POST['dateAchat '] : '';
    $name  			= isset($_POST['name']) ? $_POST['name'] : '';
    $amount  		= isset($_POST['amount']) ? $_POST['amount'] : '';

    $array = array("orderID" 					=> $orderID,
                        "idClient" 				=> $idClient,
                        "dateAchat" 			=> $dateAchat,
                        "dateInscriptionClient" => $dateInscriptionClient,
                        "name" 					=> $name),
                        "amount" 				=> $amount);
	
}