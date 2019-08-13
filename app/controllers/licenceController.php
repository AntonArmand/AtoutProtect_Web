<?php
include_once '../models/dao/licenceDAO.php';
include_once '../models/licenceModel.php';
include_once '../inc/functions.php';

$codeLicence 	= generate_licence();
$biosNumber 	= "01-02-03-04";

$dateAchat	 	= date('Y-m-d');
$dateExpiration	= date('Y-m-d', strtotime("+30 days"));
$name	  	 	= $_GET['name'];
$orderID 		= $_GET['orderID'];
$userID 		= 7;
$status			= true;

/**echo "dateAchat" + $dateAchat;
echo "dateExpiration" + $dateExpiration;
echo "name" + $name;
echo "orderID" + $orderID;
echo "userID" + $userID;**/

/**$licenceDAO = new LicenceDAO();
$licenceDAO->insertLicence($codeLicence, $dateAchat, $dateExpiration, 0, $biosNumber, $userID);
$licences = $licenceDAO->findAllLicenceByIdClient($userID);**/

/**function displayLicence(){
	foreach ($licences as $licence) {
		echo $licence->getCodeLicence();
	}	
}
**/

?>