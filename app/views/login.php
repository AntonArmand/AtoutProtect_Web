<?php
include_once 'header.php';
include_once '../controllers/clientController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="includes/img/favicon.png" type="image/png">
  <title>Conexion - Inscription</title>
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
            <a href="contact.php">Inscription - Connexion</a>
          </div>
          <h2>Inscription - Connexion</h2>
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
              <h6>California, United States</h6>
              <p>Santa monica bullevard</p>
            </div>
            <div class="info_item">
              <i class="lnr lnr-phone-handset"></i>
              <h6><a href="#">00 (440) 9865 562</a></h6>
              <p>Mon to Fri 9am to 6 pm</p>
            </div>
            <div class="info_item">
              <i class="lnr lnr-envelope"></i>
              <h6><a href="#">support@colorlib.com</a></h6>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <!-- REGISTER FORM -->
          <form class="row contact_form"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" type="email" required name="mailClient" placeholder="Entrez votre adresse email"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" required name="mdpClient"placeholder="Entrez votre mot de passe"/>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <input class="primary_btn" type="submit" requiered name="login" value="Se connecter"><br />
            </div>
          </form>
          <!-- REGISTER FORM -->
          <form class="row contact_form"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" type="text" required name="nomClient" placeholder="Entrez votre nom"  />
              </div>
              <div class="form-group">
                <input class="form-control" type="text" required name="prenomClient"  placeholder="Entrez votre prénom"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="email" required name="mailClient" placeholder="Entrez votre adresse email"/>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" required name="mdpClient"placeholder="Entrez votre mot de passe"/>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <input class="primary_btn" type="submit" requiered name="register" value="S'inscire"><br />
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
          <h2>Thank you</h2>
          <p>Your message is successfully sent...</p>
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
          <h2>Sorry !</h2>
          <p> Something went wrong </p>
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