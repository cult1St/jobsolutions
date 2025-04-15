<?php

    error_reporting(E_ALL);
    session_start();

    require_once "../classes/General.php";
    require_once "../classes/Admin.php";
    switch($_POST['update']){
        case $_POST['update']:
            $id =  General::sanitize($_POST['id']);
            $username = General::sanitize($_POST['username']);
            $password = General::sanitize($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            if(empty($username) || empty($password)){
                $_SESSION['errormsg'] = 'Complete All Fields';
                header('location:../update_admin.php');
                die();
            }
            $admin = new Admin;
            $update = $admin->update_admin($username, $password, $id);
            if($update){
                $_SESSION['feedback'] = 'Admin Updated Successfully';
                header('location:../dashboard.php');
            }else{
                $_SESSION['errormsg'] = "Unable to update Please try again";
                header("location:../update_admin.php");
            }

        break;
        default:
        $_SESSION['errormsg'] = "Please Complete The Form";
        header("location:../update_admin.php");
        exit();

    }

?>