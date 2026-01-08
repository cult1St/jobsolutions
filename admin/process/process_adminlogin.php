<?php
    session_start();
    require_once "../classes/Admin.php";
    require_once "../classes/General.php";

    if($_POST['login']){
        $email = General::sanitize($_POST['email']);
        $password = General::sanitize($_POST['password']);
       $admin = new Admin;
       $result = $admin->login($email, $password);
       if($result == 1){ //login is correct
       
        header("location:../dashboard.php");
       }else{
        header("location:../index.php");
       }

    }else{
        $_SESSION['admin_errormsg'] = "You need to complete the form";
        header("location:../index.php");
        exit();
    }





?>