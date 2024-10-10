<?php 
session_start();
require_once "../../classes/EmployerPassword.php";
require_once "../../classes/Sanitizer.php";
if($_POST['btn']){
  
    $email = $_POST['email'];
    $pass1 = new EmployerPassword();
    $find_email = $pass1->get_user( $email );
    if($find_email){
        header('location:../verifyemail.php');
    }else{
        header('location:../forgetpasswordform.php');
    }
}else{
    $_SESSION['errormsg'] = 'Pass through the form to gain access';
    header('location:../forgetpasswordform.php');
}