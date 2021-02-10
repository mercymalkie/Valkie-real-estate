<?php 
    if (session_status() == PHP_SESSION_NONE) session_start();

    require_once("./php/config.php");
    
    if(isset($_SESSION['client'])){
        $clientID = $_SESSION['client'];
        $get_client = mysqli_query($conn, "SELECT * FROM clients WHERE id = '$clientID'") or die(mysqli_error($conn));
        $client = mysqli_fetch_array($get_client);
        $name = explode(" ", $client['name']);
    }

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
                    <li class="nav-item"><a href="agent.php" class="nav-link">Agent</a></li>
                    <li class="nav-item active"><a href="properties.php" class="nav-link">Listing</a></li>
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
                    <h1 class="mb-3 bread">Properties</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section goto-here">
        <div class="container">
        <div class="row">
                <?php 
                    //get properties
                    $sql = "SELECT * FROM properties LIMIT 6";
                    $results = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    while($propery = mysqli_fetch_array($results)){
                        $agent_id = $propery['agent_id'];
                        $agent = "SELECT * FROM users WHERE id = '$agent_id'";
                        $result = mysqli_query($conn, $agent) or die(mysqli_error($conn));
                        $agent_det = mysqli_fetch_array($result);
                ?>
                    <div class="col-md-4">
                        <div class="property-wrap ftco-animate">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(./admin/image_uploads/<?php echo $propery['image'] ?>);">
                            <?php if($propery['category'] != 'Sold'){ ?>
                                <a href="properties-single.php?property_id=<?php echo $propery['id'] ?>" class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
                            <?php }else{ ?>
                                <a href="#" class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
                            <?php } ?>
                                <div class="list-agent d-flex align-items-center">
                                    <a href="#" class="agent-info d-flex align-items-center">
                                        <div class="img-2 rounded-circle" style="background-image: url(./admin/image_uploads/agents/<?php echo $agent_det['avatar'] ?>);"></div>
                                        <h3 class="mb-0 ml-2"><?php echo $propery['agent_name'] ?></h3>
                                    </a>
                                </div>
                            </div>
                            <div class="text">
                                <p class="price mb-3"><span class="orig-price">$<?php echo $propery['price'] ?></span> - 
                                    <?php
                                        if($propery['category'] == "Available" ){ ?>
                                            <button style="background-color: green !important" class="btn btn-primary btn-sm">Available</button> 
                                    <?php }else if($propery['category'] == "Sold"){ ?>
                                        <button style="background-color: red !important; color: #fff" class="btn btn-sm">Sold</button> 
                                    <?php } ?>
                                </p>
                                <?php if($propery['category'] != 'Sold'){ ?>
                                <h3 class="mb-0"><a href="properties-single.php?property_id=<?php echo $propery['id'] ?>"><?php echo $propery['property_name'] ?></a></h3>
                                <?php }else{ ?>
                                    <h3 class="mb-0"><a href="#"><?php echo $propery['property_name'] ?></a></h3>
                                <?php } ?>
                                <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i><?php echo $propery['address'] ?></span>
                                <ul class="property_list">
                                    <li><span class="flaticon-bed"></span><?php echo $propery['bedrooms'] ?></li>
                                    <li><span class="flaticon-bathtub"></span><?php echo $propery['bathrooms'] ?></li>
                                    <li><span class="flaticon-floor-plan"></span><?php echo $propery['sqft'] ?> sqft</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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