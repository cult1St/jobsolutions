<?php
session_start();
require_once "../../classes/Employer.php";
if($_POST['update']){
   $password = $_POST['password'];
   $password = password_hash($password, PASSWORD_DEFAULT);
   $name = $_POST['ogname'];
   $logo = $_FILES['logo'];
   $id = $_POST['id'];
   if(empty($name)){
    $_SESSION['errormsg'] = 'All fields required';
    header('location:../settings.php');
    die();
   }
   $emp = new Employer;
   $update = $emp->update_settings($password, $name, $logo, $id);
   if($update){
    $_SESSION['feedback'] = 'settings updated successfully';
    header('location:../employerdashboard.php');
   }else{
    $_SESSION['errormsg'] = 'unable to update';
    header('location:../settings.php');
   }
}else{
    header('location:../settings.php');
}