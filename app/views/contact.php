<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="includes/img/favicon.png" type="image/png">
    <title>AtoutProtect - Contact</title>
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
                        <a href="index.php">Home</a>
                        <a href="contact.php">Contact</a>
                    </div>
                    <h2>Nous contacter</h2>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Pricing Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div id="mapBox" class="mapBox" 
            data-lat="43.593826" 
            data-lon="1.4684249" 
            data-zoom="15" 
            data-info="insitut Limayrac, 50 Route de Limayrac, 31500, Toulouse."
            data-mlat="43.593826"
            data-mlon="1.4684249">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>AtoutProtect, <br> 50 Rue de Limayrac</h6>
                        <p>31500 - Toulouse <br> France</p>
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
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse e-mail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="L'Objet">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Votre message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary_btn"><span>Envoyer !</span></button>
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
                <h2>Désolé !</h2>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="../../includes/js/gmaps.min.js"></script>
<script src="../../includes/js/theme.js"></script>
</body>
</html>