<?php 

    require_once("./php/config.php");
    include './php/_register.php';

?>
<?php include_once("./includes/header.php"); ?>

<body>

</body>

    <div class="container mt-5">
        <?php if (session_status()==PHP_SESSION_NONE)session_start();?>
        <?php if(isset($_SESSION['register_success'])){echo $_SESSION['register_success']; } unset($_SESSION['register_success']); ?>
        <?php if(isset($_SESSION['register_error'])){echo $_SESSION['register_error']; } unset($_SESSION['register_error']); ?>
        <?php if(isset($_SESSION['client_exists'])){echo $_SESSION['client_exists']; } unset($_SESSION['client_exists']); ?>
        <div class="col-md-6 mx-auto" style="margin-top: 150px">
            <h3>Valkie Real Estates</h3>
            <h6>Register here or <a href="./login.php">Login</a> instead</h6>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email address" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Phone number" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="p_address" placeholder="Physical address" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="register" value="Register" class="btn btn-block btn-success btn-lg">
                </div>
            </form>
        </div>
    </div>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <?php include_once("./includes/footer.php") ?>

</body>
</html>