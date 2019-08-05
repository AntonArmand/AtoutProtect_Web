<?php
include_once '../models/dao/licenceDAO.php';
include_once '../inc/functions.php';

$codeLicence=generate_license();
$dateAchat= date("Y-m-d");
$dateExpiration=date('Y-m-d', strtotime("+30 days"));
$status=True;

$licenceDAO = new licenceDAO();
$licenceDAO->insertLicence($codeLicence, $dateAchat, $dateExpiration, $status);

?>