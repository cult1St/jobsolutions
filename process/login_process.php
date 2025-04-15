<?php
    session_start();

    require_once "../classes/Sanitizer.php";
    error_reporting(E_ALL);
    if($_POST['login']){
      
        $email = sanitizer($_POST['email']);
       
        $password = sanitizer($_POST['password']);
       

        require_once "../classes/User.php";

        $user = new User;
        $users = $user->check_password($email, $password);
        if($users == true){
           
            
            $_SESSION['user_id']= $users;
            if(isset($_SESSION['previous_url'])){
                header("location: ".$_SESSION['previous_url'] );
            }else{
                header("location:../employeepage.php");
            }
            
        }else{
            $_SESSION['errormsg'] = "invalid credentials";
            header("location:../login.php");
        }
 
    }else{
         $_SESSION['errormsg'] = "Try Logging in first";
        header("location:../login.php");
    }

?>