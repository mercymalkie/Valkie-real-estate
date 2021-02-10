<?php

    ob_start();

    session_start();

    if(isset($_SESSION['client'])) {

        session_destroy();

        unset($_SESSION['client']);

        header("Location: ./");
    }

?>

