<?php
include_once '../inc/functions.php';
include_once '../models/dao/achatDAO.php';
include_once '../models/achatModel.php';

$oneMonth   = isset($_POST['oneMonth']) ? $_POST['oneMonth'] : '';
$sixMonth   = isset($_POST['sixMonth']) ? $_POST['sixMonth'] : '';
$unlimited  = isset($_POST['unlimited']) ? $_POST['unlimited'] : '';

$date       = new DateTime();
$date       = $date->format('Y-m-d H:i:s');

if($oneMonth)
{
	
	
}


else if($sixMonth)
{
	
	
}


else if($unlimited)
{
	
	
}