<?php
session_start();
if($_POST['signup']){
    require_once "../../classes/Sanitizer.php";
    require_once "../../classes/Employer.php";

    $fullname = (sanitizer($_POST["firstname"])." ".sanitizer($_POST['$lastname']));
    $email = sanitizer($_POST['email']);
    $password = sanitizer($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $compname = sanitizer($_POST['ogname']);
    $state = sanitizer($_POST['states']);

    if(empty($fullname) || empty($email) || empty($password) || empty($compname) || empty($state)){
        $_SESSION['errormsg'] = 'All Fields Required';
        header('location:../../employer.php');
        exit();
        die();
    }
    $employ = new Employer;
    $signup = $employ->signup($fullname, $email, $password, $compname, $state);
    if($signup){
        $_SESSION['useronline'] = $signup;
        header('location:../employerdashboard.php');
    }else{
        
        header('location:../../employer.php');
    }
}else{
    $_SESSION['errormsg'] = 'Complete the form to gain acces';
    header('location:../../employer.php');
}
