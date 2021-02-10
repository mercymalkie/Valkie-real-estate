<?php 
    
    if (session_status() == PHP_SESSION_NONE) session_start();
    require_once("./php/config.php");
    include "./php/_buy.php";

    if(isset($_SESSION['client'])){
        $clientID = $_SESSION['client'];
        $get_client = "SELECT * FROM clients WHERE id = '$clientID'";
        $res = mysqli_query($conn, $get_client) or die(mysqli_error($conn));
        $client = mysqli_fetch_array($res);
        $name = explode(" ",$client["name"]);
    }

    if(!empty($_GET['property_id'])){
        $propery_id = $_GET['property_id'];
        $get_single_property = "SELECT * FROM properties WHERE id = '$propery_id'";
        $single_res = mysqli_query($conn, $get_single_property) or die(mysqli_error($conn));
        $single = mysqli_fetch_array($single_res);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Valkie Realestate - <?php echo $single['property_name'] ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

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
                <?php if(isset($sale_error)){ echo $sale_error; } ?>

                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread"><?php echo $single['property_name'] ?></h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties Details<i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-property-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="property-details">
                        <div class="img rounded" style="background-image: url(./admin/image_uploads/<?php echo $single['image'] ?>);"></div>
                        <div class="text">
                            <h2><?php echo $single['property_name']; if($single['category'] == "Sold"){ ?> <span class="btn btn-danger">SOLD</span> <?php } ?></h2>
                            <span class="subheading"><?php echo $single['address'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex">
                            <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                </li>
                                <?php if($single['category'] == "Available"){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Purchase</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Floor Area: <?php echo $single['floorarea'] ?> SQ FT</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Bed Rooms: <?php echo $single['bedrooms'] ?></li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Bath Rooms: <?php echo $single['bathrooms'] ?></li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Garage: 2</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Lot Area: <?php echo $single['sqft'] ?> SQ FT</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Year Build:: <?php echo $single['yearbuilt'] ?></li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Water</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Stories: <?php echo $single['stories'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <p>
                                    <?php echo $single['description'] ?>
                                </p>
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7 mx-auto">
                                        <h3 class="head">Purchase <?php echo $single['property_name'] ?></h3>
                                        <form action="" method="post" enctype = "multipart/form-data">
                                            <div class="form-group form-row">
                                                <label for="">Name</label>
                                                <input type="text" readonly="" name="name" value="<?php if(!empty($client['name'])){ echo $client['name']; } ?>" placeholder="Enter your name" class="form-control">
                                                <input type="hidden" name="property_id" value="<?php if(!empty($single['id'])){ echo $single['id']; } ?>" placeholder="Enter your name" class="form-control">
                                                <input type="hidden" name="cost" value="<?php echo $single['price'] ?>" class="form-control">
                                                <input type="hidden" name="client_id" value="<?php echo $clientID ?>" class="form-control">
                                            </div> 
                                            <div class="form-group form-row">
                                                <div class="col-md-6">
                                                    <label for="">Email</label>
                                                    <input type="email" readonly="" name="email" value="<?php if(!empty($client['email'])){ echo $client['email']; } ?>" placeholder="Email address" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Phone</label>
                                                    <input type="text" readonly="" name="phone" value="<?php if(!empty($client['phone'])){ echo $client['phone']; } ?>" placeholder="Phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Physical Address</label>
                                                <input type="text" readonly="" name="p_address" value="<?php if(!empty($client['address'])){ echo $client['address']; } ?>" placeholder="Address" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Credit card</label>
                                                <input type="text" required="" placeholder = "Credit card" name="creditcard" min="8" max="12" class="form-control">
                                            </div>
                                            <div class = "text-right">
                                                <input type="submit" style ="background-color: #d4ca68" class = "text-light btn btn-lg" name = "buyHouse" value="Get This House">
                                                <button class = "btn btn-danger btn-lg" type="reset">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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