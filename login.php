<?php 

    require_once("./php/config.php");
    include './php/_login.php';

?>
<?php include_once("./includes/header.php"); ?>

<body>

</body>

    <div class="container mt-5">
        <?php if(isset($error_login)){echo $error_login; } ?>
        <div class="col-md-6 mx-auto" style="margin-top: 150px">
            <h3>Valkie Real Estates</h3>
            <h6>Login here...</h6>
            <h6>Don't have an account? <a href="./register.php">Sign Up Now</a>...</h6>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email address" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Login" class="btn btn-block btn-success btn-lg">
                </div>
            </form>
        </div>
    </div>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <?php include_once("./includes/footer.php") ?>

</body>
</html>