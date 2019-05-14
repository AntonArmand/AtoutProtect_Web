<?php
include_once '../controllers/clientController.php';
?>
<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Mon compte </h1>
      <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <center>
        <p>
          <u>Nom</u> <br /><input type="text" required name="nomClient"  value="<?php echo $_SESSION['nomClient']; ?>" /><br />
          
          <u>Prénom</u> <br /><input type="text" required name="prenomClient"  value="<?php echo $_SESSION['prenomClient']; ?>" /><br />

          <u>Adresse mail</u> <br /><input type="email" required name="mailClient"  value="<?php echo $_SESSION['mailClient']; ?>" /><br />
          
          <u>Ancien mot de passe</u> <br /><input type="password" required name="mdpClient"/><br />

          <u>Nouveau mot de passe</u> <br /><input type="password" required name="newMdpClient"/><br />

          <u>Confirmez le nouveau mot de passe</u> <br /><input type="password" required name="newMdpClientConfirm"/><br />
          
          <input type="submit" name="save" value="Enregistrer"><br />
        </p>
      </center>
        </form>  
      </div>
    </div>
  </header>
</html>