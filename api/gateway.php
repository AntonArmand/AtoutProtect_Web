<?php
include_once '../app/models/dao/licenceDAO.php';
include_once '../app/models/licenceModel.php';
include_once '../app/models/dao/clientDAO.php';
include_once '../app/models/clientModel.php';	

$licenceDAO = new licenceDAO();
$clientDAO = new clientDAO();

$licence = $licenceDAO->findByCodeLicence($_POST['codeLicence']);
$client  = $clientDAO->findByEmail($_POST['email'], $_POST['password']);

if($client->getIdClient() == $licence->getClientID())
{
	$check = 1;
	$typeLicence = $licence->getTypeLicence();
}
else
{
	$check = 2;
}

if($check == 1) {
	echo json_encode(array(
		'code' => 'S-001',
		'typeLicence' => $typeLicence,
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

