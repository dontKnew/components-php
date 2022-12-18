<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Code With Sajid</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta content='' property='og:url'/>
    <meta content='Code With Sajid' property='og:title'/>
    <meta content='' property='og:description'/>
    <meta content='' property='og:image'/>

    <!-- Favicons -->
    <link href="<?= base_url("https://www.dpaulat.net/wp-content/uploads/2018/05/cropped-code-logo-favicon.png")?> rel="icon">
    <link href="<?= base_url("https://www.dpaulat.net/wp-content/uploads/2018/05/cropped-code-logo-favicon.png")?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url("frontend-assets/vendor/animate.css/animate.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("frontend-assets/vendor/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("frontend-assets/vendor/bootstrap-icons/bootstrap-icons.css")?>" rel="stylesheet">
    <link href="<?= base_url("frontend-assets/vendor/boxicons/css/boxicons.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("frontend-assets/vendor/glightbox/css/glightbox.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("frontend-assets/vendor/swiper/swiper-bundle.min.css")?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url("frontend-assets/css/style.css")?>" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">
            <h1><a href="<?= url_to("home") ?>"><span>Code</span>With</a><span>Sajid</span></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="<?= url_to("home") ?>#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="<?= url_to("home") ?>#about">About</a></li>
                <li><a class="nav-link scrollto" href="<?= url_to("home") ?>#services">Services</a></li>
                <li><a class="nav-link scrollto" href="<?= url_to("home") ?>#team">Team</a></li>
                <li><a href="<?= url_to("blog") ?>">Blog</a></li>
                <li><a class="nav-link scrollto" href="<?= url_to("home") ?>#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<?= $this->renderSection("main-content") ?>

<!-- ======= Footer ======= -->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <h2><span>Code </span>With <span>Sajid</span></h2>
                            </div>

                            <p>I am a Web Developer and I am passionate about technologies and love to learn new things.

                            </p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-6">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>information</h4>
                            <p>
                                If you have any query or doubt for anything, you can contact feel free 24x7 hours.
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> +91 7065221377</p>
                                <p><span>Email:</span> sajid.globalheight@gmail.com</p>
                                <p><span>Working Hours:</span> 24x7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <p>
                            &copy; Copyright 2022-23  <strong>codewithsajid</strong>. All Rights Reserved
                        </p>
                    </div>
                    <div class="credits">
                        Web Desing & Develop By <a href="https://www.facebook.com/profile.php?id=100023854041628">Sajid Ali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End  Footer -->

<div id="preloader"></div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="<?= base_url("frontend-assets/vendor/bootstrap/js/bootstrap.bundle.min.js")?>" > </script>
<script src="<?= base_url("frontend-assets/vendor/glightbox/js/glightbox.min.js")?>"></script>
<script src="<?= base_url("frontend-assets/vendor/isotope-layout/isotope.pkgd.min.js")?>"> </script>
<script src="<?= base_url("frontend-assets/vendor/swiper/swiper-bundle.min.js")?>"></script>
<script src="<?= base_url("frontend-assets/vendor/php-email-form/validate.js")?>"> </script>

<!-- Template Main JS File -->
<script src="<?= base_url("frontend-assets/js/main.js")?>"></script>

</body>

</html>

