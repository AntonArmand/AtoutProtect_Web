<?php
include_once '../models/dao/achatDAO.php';
include_once '../models/achatModel.php';
include_once '../inc/functions.php';
session_start();

$dateAchat	 	= date('Y-m-d');
$name	  	 	= $_GET['name'];
$orderID 		= $_GET['orderID'];
$amount 		= $_GET['amount'];
$typeLicence 	= $_GET['typeLicence'];
$idClient 		= $_SESSION['idClient'];

if(($dateAchat != null) && ($name != null) && ($orderID != null) && ($amount != null) && ($idClient != null))
{
	$achatDAO = new achatDAO();
	$achatDAO->insertAchat($orderID, $idClient, $dateAchat, $name, $amount);
	header('Location: licenceController.php?dateAchat='.$dateAchat.'&idClient='.$idClient.'&typeLicence='.$typeLicence);
}

?>