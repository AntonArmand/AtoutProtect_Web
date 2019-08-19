<?php
include_once '../app/models/dao/licenceDAO.php';
include_once '../app/models/licenceModel.php';
include_once '../app/models/dao/clientDAO.php';
include_once '../app/models/clientModel.php';	
include_once '../app/inc/functions.php';

$codeLicence = $_POST['codeLicence'];

$licenceDAO = new licenceDAO();
$clientDAO = new clientDAO();

$licence = $licenceDAO->findByCodeLicence($codeLicence);
$client  = $clientDAO->findByEmail($_POST['email'], hashage($_POST['password']));

if($client->getIdClient() == $licence->getClientID())
{
	$check = 1;
	$typeLicence = $licence->getTypeLicence();
	$dateAchat = $licence->getDateAchat();
	$codeLicence = $licence->getCodeLicence();	

}
else
{
	$check = 2;
}

if($check == 1) {

	echo json_encode(array(
		'code' => 'S-001',
		'typeLicence' => $typeLicence,
		'dateAchat' => $dateAchat,
		'codeLicence' => $codeLicence,
	));

} elseif($check == 2) {
	echo json_encode(array(
		'code' => 'S-002',
	));
} elseif($check == 3) {
	echo json_encode(array(
		'code' => 'S-003',
	));
}


