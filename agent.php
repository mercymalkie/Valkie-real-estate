<?php 

    require_once("./php/config.php");
    include './php/_search.php';

?>
<?php include_once("./includes/header.php"); ?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
        <a class="navbar-brand" href="index.php">Valkie Realestate</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item active"><a href="agent.php" class="nav-link">Agent</a></li>
                    <li class="nav-item"><a href="properties.php" class="nav-link">Listing</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php 
                        if(isset($_SESSION['client'])){
                    ?>
                        <li class="nav-item"><a href="logout.php" class="nav-link btn btn-sm btn-danger text-light"><?php echo $name[1] ." - Logout" ?></a></li>
                    <?php }else{ ?>
                        <li class="nav-item"><a href="login.php" class="nav-link ">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread">Agents</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Agents <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-agent">
        <div class="container">
            <div class="row">
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-1.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">Ben Ford</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">43 Properties</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-2.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">John Cooper</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">28 Properties</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-3.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">Janice Clinton</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">30 Properties</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-4.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">Eunice Henceford</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">25 Properties</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-5.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">Ben Ford</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">43 Properties</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-6.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">John Cooper</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">28 Properties</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-7.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">Janice Clinton</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">30 Properties</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ftco-animate">
                    <div class="agent">
                        <div class="img">
                            <img src="images/team-8.jpg" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3><a href="properties.php">Eunice Henceford</a></h3>
                            <p class="h-info"><span class="ion-ios-filing icon"></span> <span class="details">25 Properties</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Findstate</h2>
                        <p>Far far away, behind the word mountains, far from the countries.</p>
                        <ul class="ftco-footer-social list-unstyled mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Community</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Search Properties</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>For Agents</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Reviews</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">About Us</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Our Story</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Meet the team</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Company</h2>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Press</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>