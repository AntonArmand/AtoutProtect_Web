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
          <u>Adresse mail</u> <br /><input type="email" required name="mailClient" /><br />
          
          <u>Mot de passe</u> <br /><input type="password" required name="mdpClient"/><br />
          
          <input type="submit" name="login" value="Se connecter"><br />
        </p>
      </center>
        </form>  

        <a href="changePassword.php" > <input type="button" value="Bouton"> </a>

      </div>
    </div>
  </header>
</html>