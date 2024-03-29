<?php
include_once 'header.php';
include_once '../controllers/clientController.php';
include_once '../models/dao/licenceDAO.php';
include_once '../models/licenceModel.php';

$licenceDAO = new LicenceDAO();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="includes/img/favicon.png" type="image/png">
  <title>Edition - Profil</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../includes/css/bootstrap.css">
  <link rel="stylesheet" href="../../includes/vendors/linericon/style.css">
  <link rel="stylesheet" href="../../includes/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../includes/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="../../includes/vendors/lightbox/simpleLightbox.css">
  <link rel="stylesheet" href="../../includes/vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="../../includes/vendors/animate-css/animate.css">
  <!-- main css -->
  <link rel="stylesheet" href="../../includes/css/style.css">
  <link rel="stylesheet" href="../../includes/css/responsive.css">
</head>
<body>
  <!--================Header Menu Area =================-->

  <!--================ Start Pricing Banner Area =================-->
  <section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
      <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
      <div class="container">
        <div class="banner_content text-left">
          <div class="page_link">
            <a href="../../index.php">Accueil</a>
            <a href="contact.php">Edition - Profil</a>
          </div>
          <h2>Edition - Profil</h2>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Pricing Banner Area =================-->

  <!--================Contact Area =================-->
  <section class="contact_area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="contact_info">
            <div class="info_item">
              <i class="lnr lnr-home"></i>
              <h6>AtoutProtect, <br> 56 Avenue Jean</h6>
              <p>31000 - Toulouse<br> France</p>
            </div>
            <div class="info_item">
              <i class="lnr lnr-phone-handset"></i>
              <h6><a href="#">+33 (0)5 41 41 00 00</a></h6>
              <p>Lun au Ven 7h à 19h</p>
            </div>
            <div class="info_item">
              <i class="lnr lnr-envelope"></i>
              <h6><a href="#">support@atoutprotect.com</a></h6>
              <p>Nous sommes la pour vous!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <!-- EDIT PROFIL FORM -->
          <form class="row contact_form"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" type="text" required name="nomClient" value="<?php echo $_SESSION['nomClient']; ?>"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="text" required name="prenomClient" value="<?php echo $_SESSION['prenomClient']; ?>" />
              </div>
              <div class="form-group">
                <input class="form-control" type="email" required name="mailClient" value="<?php echo $_SESSION['mailClient']; ?>"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" required name="mdpClient" placeholder="Entrez votre mot de passe actuel"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" required name="newMdpClient" placeholder="Entrez votre nouveau mot de passe"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" required name="newMdpClientConfirm" placeholder="Confirmez votre nouveau mot de passe"/>
              </div>
              <div class="form-group">
                <?php $licences = $licenceDAO->findAllLicenceByIdClient(7); ?>
                <select id="licences">
                  <option value="">--Choisissez votre licence--</option>

                  <?php foreach($licences as $licence): ?>
                  <?php if($licence->getStatus()): ?>
                  <option value="<?= $licence->getCodeLicence(); ?>" style="color:green;"><?= $licence->getCodeLicence(); ?></option>
                  <?php elseif($licence->getStatus() != 1): ?>
                  <option value="<?= $licence->getCodeLicence(); ?>" style="color:red;"><?= $licence->getCodeLicence(); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
              </select> 

              </div>
            </div>
            <div class="col-md-12">
                <input id="buttonSubmit" class="primary_btn" type="submit" requiered name="save" value="Enregistrer"><br />
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--================Contact Area =================-->

  <!--================Contact Success and Error message Area =================-->
  <div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
          </button>
          <h2>Merci</h2>
          <p>Votre message a été envoyé...</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modals error -->

  <div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
          </button>
          <h2>Desolé !</h2>
          <p> Une erreur est survenue </p>
        </div>
      </div>
    </div>
  </div>
  <!--================End Contact Success and Error message Area =================-->
  <?php
  include_once 'footer.php';
  ?>        


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../../includes/js/jquery-3.2.1.min.js"></script>
  <script src="../../includes/js/popper.js"></script>
  <script src="../../includes/js/bootstrap.min.js"></script>
  <script src="../../includes/js/stellar.js"></script>
  <script src="../../includes/js/jquery.magnific-popup.min.js"></script>
  <script src="../../includes/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="../../includes/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="../../includes/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="../../includes/vendors/isotope/isotope-min.js"></script>
  <script src="../../includes/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="../../includes/js/jquery.ajaxchimp.min.js"></script>
  <script src="../../includes/js/mail-script.js"></script>
  <script src="../../includes/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="../../includes/vendors/counter-up/jquery.counterup.min.js"></script>
  <!-- contact js -->
  <script src="../../includes/js/jquery.form.js"></script>
  <script src="../../includes/js/jquery.validate.min.js"></script>
  <script src="../../includes/js/contact.js"></script>
  <!--gmaps Js-->
  <script src="../../includes/js/gmaps.min.js"></script>
  <script src="../../includes/js/theme.js"></script>
</body>
</html>