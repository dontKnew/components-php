<?php
define("TITLE", "Cosmetics Items Courier Services in Delhi/NCR | Rapidex Worldwide Express");
define("DESCRIPTION", "Rapidex the worldwide express is the most leading cosmetics items courier  services provider in Delhi/NCR, who delivers the products internationally all around the world from India and vice versa");
define("KEYWORDS", "Cosmetics Items Courier Services in Delhi/NCR");
?>

<?php include("include/header.php") ?>
    <div class="jumbotron mans_bread">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h4 class="text-white">Track Your Shipment</h4>
                    <div class="tab-pane bg-none fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <form class="" id="contactForm" onSubmit="return false;" >
                            <div class="input-group">
                                <input  id="type_no" name="type_no" class="form-control" required data-error="Please enter your Tracking Details" style="margin-top: 0px;margin-bottom: 0px;height: 49px;" placeholder="Enter your tracking number">
                                <div class="input-group-prepend d-block mans-track">
                                    <button type="submit" class="default-btn-one newcss disabled mt-0 bg-logorange" onclick="trackOrder()" style="pointer-events: all; cursor: pointer;height:49px;">Track</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="about-text-area">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-safe-text">
                                <h2>Cosmetics Items Courier Services in Delhi/NCR</h2>

                                <p><a href="https://rapidexworldwide.com/">Rapidex worldwide express</a> is the most leading courier service provider, who delivers the products internationally all around the world from India and vice versa. The Rapidex has the ability to reach more than 200 countries with its strong, powerful and professional team who never neglect to work for you. We work day night for the best service in regards to shipping our precious and regular cosmetic products. </p>
                                <p>Cosmetics are the need of most of the people and there is a variety of products which we carry not only into the cities but from major cities to your home without any delay.
                            </div>
                        </div>
                        <!--<div class="col-lg-5">-->
                        <!--    <div class="safe-image"> <img src="assets/img/services/Courier-Services.jpg" alt="Enquire Now"> </div>-->
                        <!--    <div class="enQ"><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="cursor:pointer;" class="Enquiry">Get Charges</a></div>-->
                        <!--</div>-->
                        <style>
                            #enquiry_form_footer{
                                font-size: 20px !important;
                                text-align:center;
                                margin-left:22px;
                            }
                        </style>

                        <?php include("/home4/elect7wk/rapidexworldwide.com/international-courier-service-delhi/include/enquiry_form.php"); ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-safe-text">
                                <p> There are a number of cities believing in us and choosing us for the international super fast delivery, we the Rapidex worldwide express also taking step forward to provide you the service which is beyond the expectation.</p>
                                <p>Get our important cosmetics items courier services at your doorstep within the given period of time with proper handling and care by Rapidex worldwide express and also get the other services mentioned below:</p>
                                <ul>
                                    <li>Express Delivery Worldwide</li>
                                    <li>Overnight Delivery</li>
                                </ul>
                                <div class="our-services-area">
                                    <h1 class="effectBox mtEffect">You may be interested in:</h1>
                                    <div class="container">
                                        <?php require_once("".ROOT_PATH."/include/component/services_page_box.php") ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <?php require_once("".ROOT_PATH."/include/component/services_sidebar.php") ?>
                    <div class="mt"></div>
                </div>
            </div>
        </div>
    </div>
<?php include("include/component/pickup_location.php") ?>

<?php include("include/footer.php") ?>