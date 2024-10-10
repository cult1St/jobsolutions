<?php
    if(!isset($_SESSION['user_id'])){
        $_SESSION['errormsg'] = "Try Logging in first";
        header("location:login.php");
        die();
    }


?>