<?php
    session_start();

    require_once "../classes/Sanitizer.php";
    error_reporting(E_ALL);
    if($_POST['register']){
        $firstname = sanitizer($_POST['firstname']);
        $lastname = sanitizer($_POST['lastname']);
        $email = sanitizer($_POST['email']);
        $number = sanitizer($_POST['number']);
        $DOB = sanitizer($_POST['year'])."-".sanitizer($_POST['month'])."-".sanitizer($_POST['day']);
        $DOB = date($DOB);
        $state = sanitizer($_POST['states']);
        $gender = sanitizer($_POST['gender']);
        $password = sanitizer($_POST['cpassword']);

        if(empty($firstname) || empty($lastname) || empty($email) || empty($number) || empty($DOB) || empty($state) || empty($gender) || empty($password)){
            $_SESSION['errormsg'] = 'All Fields required';
            header("location:../login.php");
            exit();
            die();

        }
        $password = password_hash($password, PASSWORD_BCRYPT);


        require_once "../classes/User.php";

        $user = new User;
        $users = $user->insert_user($firstname, $lastname, $email, $password, $DOB, $number, $state, $gender);
        if($users){
            $user_id = $user->get_user_id($email);
            
            $_SESSION['user_id']= $user_id;
            header("location:../employeepage.php");
        }else{
            header("location:../login.php");
        }
 
    }else{
        header("location:../login.php");
    }

?>