<?php
    if(!isset($_SESSION['user_id'])){
        $_SESSION['errormsg'] = "Try Logging in first";
        //save previus url in session
        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
            $_SESSION['previous_url'] = $_SERVER['HTTP_REFERER'];
            echo "The previous URL is: " . $previous_url;
        } 
        header("location:login.php");
        die();
    }


?>