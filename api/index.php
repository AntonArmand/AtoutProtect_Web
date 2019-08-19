<?php 
include_once '../app/models/dao/licenceDAO.php';
include_once '../app/models/licenceModel.php';	

filter_var_array($_POST, FILTER_SANITIZE_STRING);

if($_GET){
$codeLicence = $_GET['codeLicence'];
$email = $_GET['email'];
$password = $_GET['password'];


$data = array(
    'codeLicence' => $codeLicence,
    'email' => $email,
    'password' => $password
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://rpi-projet.pw/api/gateway.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = curl_exec($ch);
$error = curl_error($ch);
$errno = curl_errno($ch);

curl_close($ch);

$response = json_decode($response, true);
var_dump($response);

$licenceDAO = new licenceDAO();
$licence = $licenceDAO->findByCodeLicence($codeLicence);
$type = $licence->getTypeLicence();
$dateAchat = $licence->getDateAchat();

if($type == 1)
{
	$dateExpiration = strtotime($dateAchat. ' +30 days');
}
if($type == 2)
{
	$dateExpiration = strtotime($dateAchat. ' +180 days');

}
if($type == 3)
{
	$dateExpiration = strtotime($dateAchat. ' +18000 days');

}
//$licenceDAO->updateLicence($codeLicence, $dateExpiration);
}
