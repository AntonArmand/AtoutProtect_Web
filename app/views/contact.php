<?php
include_once 'app/views/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="includes/img/favicon.png" type="image/png">
    <title>Nexus SaaS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="includes/css/bootstrap.css">
    <link rel="stylesheet" href="includes/vendors/linericon/style.css">
    <link rel="stylesheet" href="includes/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="includes/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="includes/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="includes/vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" href="includes/css/responsive.css">
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
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Pricing Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div id="mapBox" class="mapBox" 
            data-lat="40.701083" 
            data-lon="-74.1522848" 
            data-zoom="13" 
            data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
            data-mlat="40.701083"
            data-mlon="-74.1522848">
        </div>
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
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary_btn"><span>Send Message</span></button>
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
include_once 'app/views/footer.php';
?>        


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="includes/js/jquery-3.2.1.min.js"></script>
<script src="includes/js/popper.js"></script>
<script src="includes/js/bootstrap.min.js"></script>
<script src="includes/js/stellar.js"></script>
<script src="includes/js/jquery.magnific-popup.min.js"></script>
<script src="includes/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="includes/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="includes/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="includes/vendors/isotope/isotope-min.js"></script>
<script src="includes/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="includes/js/jquery.ajaxchimp.min.js"></script>
<script src="includes/js/mail-script.js"></script>
<script src="includes/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="includes/vendors/counter-up/jquery.counterup.min.js"></script>
<!-- contact js -->
<script src="includes/js/jquery.form.js"></script>
<script src="includes/js/jquery.validate.min.js"></script>
<script src="includes/js/contact.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="includes/js/gmaps.min.js"></script>
<script src="includes/js/theme.js"></script>
</body>
</html>