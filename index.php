<?php 
    if (session_status() == PHP_SESSION_NONE) session_start();

    require_once("./php/config.php");
    include './php/_search.php';

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
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="agent.php" class="nav-link">Agent</a></li>
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

    <div class="hero-wrap" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                    <div class="text text-center w-100">
                        <h1 class="mb-4">Find Properties <br>That Make You Money</h1>
                        <?php if(isset($_SESSION["sale_success"])){ echo $_SESSION["sale_success"]; } unset($_SESSION["sale_success"]); ?>
                        <?php if(!isset($_SESSION['client'])){ ?>
                            <p><a href="register.php" class="btn btn-primary py-3 px-4">Get Started !</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
            </a>
        </div>
    </div>


    <section class="ftco-section ftco-no-pb" id="search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate">
                        <form action="" method="post" class="search-property-1">
                            <div class="row">
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Location</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="location" id="" class="form-control">
                                                    <option value="">City/Location</option>
                                                    <?php 
                                                        $sql = "SELECT * FROM cities";
                                                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                                                        while($cities = mysqli_fetch_array($result)){
                                                    ?>
                                                        <option value="<?php echo $cities['name'] ?>"><?php echo $cities['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Property Type</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="property_type" id="" class="form-control">
                                                    <option value="">Type</option>
                                                    <option value="Commercial">Commercial</option>
                                                    <option value="Office">Office</option>
                                                    <option value="Residential">Residential</option>
                                                    <option value="Villa">Villa</option>
                                                    <option value="Condominium">Condominium</option>
                                                    <option value="Apartment">Apartment</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Property Status</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="property_status" id="" class="form-control">
                                                    <option value="">Type</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <label for="#">Price Limit</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="price_range" id="" class="form-control">
                                                    <option value="5000">$5,000</option>
                                                    <option value="10000">$10,000</option>
                                                    <option value="50000">$50,000</option>
                                                    <option value="100000">$100,000</option>
                                                    <option value="200000">$200,000</option>
                                                    <option value="300000">$300,000</option>
                                                    <option value="400000">$400,000</option>
                                                    <option value="500000">$500,000</option>
                                                    <option value="600000">$600,000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg align-self-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <input type="submit" name="search" value="Search Property" class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section goto-here">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">What we offer</span>
                    <h2 class="mb-2">Exclusive Offer For You</h2>
                </div>
            </div>
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
                                <a href="properties-single.php?property_id=<?php echo $propery['id'] ?>" class="icon d-flex align-items-center justify-content-center btn-custom">
                                    <span class="ion-ios-link"></span>
                                </a>
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
                                <h3 class="mb-0"><a href="properties-single.php?property_id=<?php echo $propery['id'] ?>"><?php echo $propery['property_name'] ?></a></h3>
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
            <div class="ftco-animate d-flex align-items-end">
                <div class="text text-center w-100">
                    <p><a href="./properties.php" style="a:hover{background-color: green" class="btn btn-primary py-3 px-4">View More Properties</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-fullwidth">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Services</span>
                    <h2 class="mb-2">Why Choose Us?</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row d-md-flex text-wrapper align-items-stretch">
                <div class="one-half mb-md-0 mb-4 img d-flex align-self-stretch" style="background-image: url('images/about.jpg');"></div>
                <div class="one-half half-text d-flex justify-content-end align-items-center">
                    <div class="text-inner pl-md-5">
                        <div class="row d-flex">
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>No Downpayment</h3>
                                        <p>All payments are made once the on house purchase.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>All Cash Offer</h3>
                                        <p>Once the payment is made and successfull, you become an owener of most exquisit propery in town.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Experts in Your Corner</h3>
                                        <p>We have a great team of most experienced and profesional Agents ready to assist you.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                                <div class="media block-6 services-wrap d-flex">
                                    <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-locked"></span></div>
                                    <div class="media-body pl-4">
                                        <h3>Locked in Pricing</h3>
                                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="305">0</strong>
                            <span>Area <br>Population</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="1090">0</strong>
                            <span>Total <br>Properties</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="209">0</strong>
                            <span>Average <br>House</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="67">0</strong>
                            <span>Total <br>Branches</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Find Properties</span>
                    <h2 class="mb-2">Find Properties In Your City</h2>
                </div>
            </div>
            <div class="row">
                <?php 

                    $city_name = "SELECT * FROM cities";
                    $results = mysqli_query($conn, $city_name) or die(mysqli_error($conn));
                    while($list = mysqli_fetch_array($results)){
                        $city = $list['name'];
                        $propery = "SELECT * FROM properties WHERE city = '$city'";
                        $result = mysqli_query($conn, $propery) or die(mysqli_error($conn));
                        $count = mysqli_num_rows($result);
                
                ?>
                    <div class="col-md-4">
                        <div class="listing-wrap img rounded d-flex align-items-end" style="background-image: url(./admin/image_uploads/cities/<?php echo $list['city_picture'] ?>);">
                            <div class="location">
                                <span class="rounded"><?php echo $city ?>, USA</span>
                            </div>
                            <div class="text">
                                <h3><a href="#"><?php echo $count ?> Property Listing</a></h3>
                                <a href="#" class="btn-link">See All Listing <span class="ion-ios-arrow-round-forward"></span></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Happy Clients</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-agent">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Agents</span>
                    <h2 class="mb-4">Our Agents</h2>
                </div>
            </div>
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
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_1.jpg');">
                            </a>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 17, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_2.jpg');">
                            </a>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 17, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_3.jpg');">
                            </a>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 17, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_4.jpg');">
                            </a>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 17, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
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


    <?php include_once("./includes/footer.php") ?>

</body>
</html>