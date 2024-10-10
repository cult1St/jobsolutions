<?php
session_start();
require_once "../classes/Admin.php";
require_once "../classes/General.php";
if(isset($_POST["add"]) && $_POST["add"] == "add"){
    $username = General::sanitize($_POST["username"]);
    $password = General::sanitize($_POST["password"]);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $admin = new Admin;
    $add = $admin->addAdmin($username, $password);
    if($add){
        $_SESSION["feedback"] = "Admin Added Successfully";
        header("location:../dashboard.php");
    }else{
        $_SESSION["errormsg"] = "Unable to add admin";
        header("location:../addAdmin.php");
    }
}else{
    $_SESSION["errormsg"] = "Submit The form to gain access";
    header("location:../dashboard.php");
}