<?php
include_once '../models/dao/licenceDAO.php';
include_once '../models/licenceModel.php';
include_once '../inc/functions.php';
session_start();

$codeLicence 	= generate_licence();
$biosNumber 	= "";

$dateAchat	 	= date('Y-m-d');
$idClient 		= $_GET['idClient'];
$typeLicence 	= $_GET['typeLicence'];
$dateExpiration = date('Y-m-d');


if(($dateAchat != null) && ($idClient != null) && ($dateExpiration != null))
{
	$licenceDAO = new LicenceDAO();
	$licenceDAO->insertLicence($codeLicence, $dateAchat, $dateExpiration, 0, $biosNumber, $typeLicence, $idClient);
	header('Location: ../views/profil.php');

}
else
{
	header('Location: ../views/index.php');
}


?>