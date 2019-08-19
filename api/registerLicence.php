<?php
include_once '../app/models/dao/licenceDAO.php';
include_once '../app/models/licenceModel.php';
include_once '../app/models/clientModel.php';
include_once '../app/models/dao/clientDAO.php';


	var_dump($_GET);
	$codeLicence =  $_GET['codeLicence'];
	$email = $_GET['email'];
	$password = $_GET['password'];

	$clientDAO = new clientDAO();
	$client = $clientDAO->findByEmail($email, $password);

	$licenceDAO = new licenceDAO();
	$licence = $licenceDAO->findByCodeLicence($codeLicence);


	$idClient = $licence->getClientID();
	$dateAchat = $licence->getDateAchat();
	$typeLicence = $licence->getTypeLicence();

	if($client->getIdClient() == $licence->getClientID())
	{
		if($typeLicence == 1) {
			$dateExpiration = strtotime('+30 days',strtotime($dateAchat));
		}

		if($typeLicence == 2) {
			$dateExpiration = strtotime('+1800 days',strtotime($dateAchat));
		}

		if($typeLicence == 3) {
			$dateExpiration = strtotime('+90000 days',strtotime($dateAchat));
		}

		$licenceDAO->updateLicence($codeLicence , $dateExpiration);
		return;
	}


?>