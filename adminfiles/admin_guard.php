<?php

    error_reporting(E_ALL);
    
    if(!isset($_SESSION['adminonline'])){
        $_SESSION['admin_errormsg'] = "You need to login to access this page";
        header("location:index.php");
        exit();
    }



?>