

<?php
include_once '../controllers/clientController.php';
?>




<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Inscription </h1>
      <hr>
        <form action="/aProtect/app/views/register.php" method="post">
      <center>
        <p>
          <u>Nom</u> <br /><input type="text" required name="nomClient"  /><br />
          
          <u>Prénom</u> <br /><input type="text" required name="prenomClient"  /><br />

          <u>Adresse mail</u> <br /><input type="email" required name="mailClient" /><br />
          
          <u>Mot de passe</u> <br /><input type="password" required name="mdpClient"/><br />
          
          <input type="submit" name="register" value="S'inscrire"><br />
        </p>
      </center>
        </form>  
      </div>
    </div>
  </header>
</html>