<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
          <form class="row contact_form"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-md-12">
                <input id="buttonSubmit" class="primary_btn" type="submit" requiered name="test" value="S'inscrire"><br />
            </div>
          </form>
</body>
</html>

<?php
$test   = isset($_POST['test']) ? $_POST['test'] : '';

if($test)
{
	$codeLicence = "NEQA-TWYG-TM5L-GSSH";
	$email = "matthieu.baunac@limayrac.fr";
	$password = "be5668cca19d2dba09f4affa583f800abd40f2fcd9ccc364f4215f0bb85c209b";

	header('Location: https://www.rpi-projet.pw/api/index.php?codeLicence='.$codeLicence.'&email='.$email.'&password='.$password);
}

?>