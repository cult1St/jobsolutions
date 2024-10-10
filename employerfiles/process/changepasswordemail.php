<?php 
session_start();
require_once "../../classes/Sanitizer.php";
require_once "../../classes/EmployerPassword.php";
if($_POST['change']){
    $id = $_SESSION['fp_user_id'];
    $password = sanitizer($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $change = new EmployerPassword();
    $change_pass = $change->change_password( $password, $id );
    if($change_pass){
        $_SESSION['useronline'] = $id;
        unset($_SESSION['emailpassmsg']);
        header('location:../employerdashboard.php');
       
    }else{
        $_SESSION['errormsg'] = 'Unable to change password please try again';
        header('location:../forgetpasswordform.php');

    }


}else{
    $_SESSION['errormsg'] = 'Pass through the form to gain access';
    header('location:../forgetpasswordform.php');
}