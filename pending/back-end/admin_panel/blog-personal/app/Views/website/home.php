<?= $this->extend('website') ?>
<?= $this->section('main-content') ?>
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active" style="background-image: url(frontend-assets/img/hero-carousel/1.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">The Best Business Information </h2>
                            <p class="animate__animated animate__fadeInUp">We're In The Business Of Helping You Start Your Business</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url(frontend-assets/img/hero-carousel/2.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">At vero eos et accusamus</h2>
                            <p class="animate__animated animate__fadeInUp">Helping Business Security & Peace of Mind for Your Family</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" style="background-image: url(frontend-assets/img/hero-carousel/3.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Temporibus autem quibusdam</h2>
                            <p class="animate__animated animate__fadeInUp">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem</p>
                            <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero Section -->
<main id="main">
    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>About eBusiness</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <a href="#">
                                <img src="<?= base_url("frontend-assets/img/about/2.jpg")?>" alt="profile_image">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <div class="single-well">
                            <a href="#">
                                <h4 class="sec-head">About Me</h4>
                            </a>
                            <p>
                                I am a Web Developer and I am passionate about technologies and love to learn new things.
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-check"></i> Promotion Sites
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Dynamic Website
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Web Application
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Bluk Services
                                </li>
                                <li>
                                    <i class="bi bi-check"></i> Web Programming
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div>
    <!-- End About Section -->
    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <!-- Start Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-briefcase"></i>
                                </a>
                                <h4>Expert Coder</h4>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-card-checklist"></i>
                                </a>
                                <h4>Creative Designer</h4>

                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-bar-chart"></i>
                                </a>
                                <h4>Wordpress Developer</h4>

                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-binoculars"></i>
                                </a>
                                <h4>Social Marketer </h4>

                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <!-- End Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-brightness-high"></i>
                                </a>
                                <h4>Seo Expart</h4>

                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                <!-- End Left services -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- end col-md-4 -->
                    <div class=" about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <a class="services-icon" href="#">
                                    <i class="bi bi-calendar4-week"></i>
                                </a>
                                <h4>24/7 Support</h4>

                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services Section -->

    <!--start team section-->
    <div id="team" class="our-team-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Our special Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= base_url("frontend-assets/img/team/sajid.jpeg")?>" height="200px" alt="">
                            </a>
                            <div class="team-social-icon text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Sajid Ali</h4>
                            <p>Seo</p>
                        </div>
                    </div>
                </div>
                <!-- End column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= base_url("frontend-assets/img/team/sajid.jpeg")?>" alt="">
                            </a>
                            <div class="team-social-icon text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Sajid Ali</h4>
                            <p>Web Developer</p>
                        </div>
                    </div>
                </div>
                <!-- End column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= base_url("frontend-assets/img/team/sajid.jpeg")?>" alt="">
                            </a>
                            <div class="team-social-icon text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Sajid Ali</h4>
                            <p>Web Design</p>
                        </div>
                    </div>
                </div>
                <!-- End column -->
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= base_url("frontend-assets/img/team/sajid.jpeg")?>" alt="">
                            </a>
                            <div class="team-social-icon text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Sajid Ali</h4>
                            <p>Seo Expert</p>
                        </div>
                    </div>
                </div>
                <!-- End column -->
            </div>
        </div>
    </div>
    <!-- End Team Section -->

    <!--start blog section-->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Latest Post</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Left Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="blog.html">
                                    <img src="<?= base_url("frontend-assets/img/blog/1.jpg")?>"alt="">
                                </a>
                            </div>
                            <div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-comment-o"></i>
                    <a href="#">13 comments</a>
                  </span>
                                <span class="date-type">
                    <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                  </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="blog.html">Assumenda repud eum veniam</a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                                </p>
                            </div>
                            <span>
                  <a href="blog.html" class="ready-btn">Read more</a>
                </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <!-- End Left Blog-->
                    <!-- Start Left Blog -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog.html">
                                        <img src="<?= base_url("frontend-assets/img/blog/2.jpg")?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                      <span class="comments-type">
                        <i class="fa fa-comment-o"></i>
                        <a href="#">130 comments</a>
                      </span>
                                    <span class="date-type">
                        <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                      </span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="blog.html">Explicabo magnam quibusdam.</a>
                                    </h4>
                                    <p>
                                        Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                                    </p>
                                </div>
                                <span>
                      <a href="blog.html" class="ready-btn">Read more</a>
                    </span>
                            </div>
                            <!-- Start single blog -->
                        </div>
                        <!-- End Left Blog-->
                        <!-- Start Right Blog-->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="blog.html">
                                        <img src="<?= base_url("frontend-assets/img/blog/3.jpg")?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">
                      <span class="comments-type">
                        <i class="fa fa-comment-o"></i>
                        <a href="#">10 comments</a>
                      </span>
                                    <span class="date-type">
                        <i class="fa fa-calendar"></i>2016-03-05 / 09:10:16
                      </span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="blog.html">Lorem ipsum dolor sit amet</a>
                                    </h4>
                                    <p>
                                        Lorem ipsum dolor sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.sit amet conse adipis elit Assumenda repud eum veniam optio modi sit explicabo nisi magnam quibusdam.
                                    </p>
                                </div>
                                <span>
                      <a href="blog.html" class="ready-btn">Read more</a>
                    </span>
                            </div>
                        </div>
                        <!-- End Right Blog-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->
    <!--start contact section-->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Contact us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-phone"></i>
                                <p>
                                    Call: +91 7065221377<br>
                                    <span>Any Time</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-envelope"></i>
                                <p>
                                    Email: sajid.globalheight@gmail.com<br>
                                    <span>Web: https://codewithsajid.com</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Start contact icon column -->
                    <div class="col-md-4">
                        <div class="contact-icon text-center">
                            <div class="single-icon">
                                <i class="bi bi-geo-alt"></i>
                                <p>
                                    Location: Fun'n Food Village, Kapashera<br>
                                    <span>Delhi-110037, India</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Start Google Map -->
                    <div class="col-md-6">
                        <!-- Start Map -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14021.965652753215!2d77.07100382357912!3d28.524945572372935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1be7697b4cc1%3A0xaa5438802f6a5895!2sKapas%20Hera%2C%20New%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1667406657119!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!-- End Map -->
                    </div>
                    <!-- End Google Map -->

                    <!-- Start  contact -->
                    <div class="col-md-6">
                        <div class="form contact-form">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <!-- End Left contact -->
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
