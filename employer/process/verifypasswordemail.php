<?php 
session_start();

if($_POST['verify']){
    $code = $_POST['code'];
    if($code == $_SESSION['emailpassmsg']){
        header('location:../changepassword.php');
    }else{
    $_SESSION['errormsg'] = 'Wrong code entered';
    header('location:../forgetpasswordform.php');
    }
}else{
    $_SESSION['errormsg'] = 'Pass through the form to gain access';
    header('location:../forgetpasswordform.php');
}