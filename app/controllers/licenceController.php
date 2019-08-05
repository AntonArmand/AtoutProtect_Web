<?php
include_once '../models/dao/licenceDAO.php';

//Generation de la licence ici

$codeLicence="ABAA-BBBB-CCCC-DDDD";
$dateAchat= date("Y-m-d");
$dateExpiration=$dateAchat;
$status=True;

$licenceDAO = new licenceDAO();
$licenceDAO->insertLicence($codeLicence, $dateAchat, $dateExpiration, $status);

?>