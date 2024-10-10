<?php
    if(!isset($_SESSION['useronline'])){
         $_SESSION['errormsg'] = "Try Logging in first";
        header("location:../employer.php");
    }


?>