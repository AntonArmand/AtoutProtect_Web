<?php
include_once '../models/dao/licenceDAO.php';
include_once '../models/dao/activationDAO.php';
include_once '../inc/functions.php';

$codeLicence 	= generate_licence();
$biosNumber 	= "bios";

$dateAchat	 	= $_GET['date'];
$dateExpiration	= date('Y-m-d', strtotime("+30 days"));
$name	  	 	= $_GET['name'];
$orderID 		= $_GET['orderID'];
$userID 		= $_GET['userID']; 
$status			= true;

echo "dateAchat" + $dateAchat;
echo "dateExpiration" + $dateExpiration;
echo "name" + $name;
echo "orderID" + $orderID;
echo "userID" + $userID;

$activation = new activationDAO();
$activation->insertLicenceDesactived($codeLicence, false, $biosNumber);

$licenceDAO = new licenceDAO();
$licenceDAO->insertLicence($codeLicence, $dateAchat, $dateExpiration, 3);


// Rajouter une clé étrangère dans activation qui pointe vers idLicence de licence.

?>