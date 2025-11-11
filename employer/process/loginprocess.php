<?php
session_start();
if($_POST['login']){
    require_once "../../classes/Sanitizer.php";
    require_once "../../classes/Employer.php";

    
    $email = sanitizer($_POST['email']);
    $password = sanitizer($_POST['password']);
    

    if(empty($email) || empty($password)){
        $_SESSION['errormsg'] = 'All Fields Required';
        header('location:../../employer.php');
        exit();
        die();
    }
    $employ = new Employer;
    $signup = $employ->login($email, $password);
   
   
    if($signup){
        $_SESSION['useronline'] = $signup;
        header('location:../employerdashboard.php');
    }else{
       // $_SESSION['errormsg'] = 'Invalid Credentials';
        header('location:../../employer.php');
    }
}else{
    $_SESSION['errormsg'] = 'Complete the form to gain acces';
    header('location:../../employer.php');
}
