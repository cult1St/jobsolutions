<?php
session_start();
if($_POST['save']){
    require_once "../classes/User.php";
    $phone = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $qualification = $_POST['qualification'];
    $address = $_POST['address'];
    $experience = $_POST['experience'];
    $file = $_FILES['cv'];
    
    $errors = [];

           
            if(empty($email)){
                array_push($errors, "Enter Your Email");
               
            }
            
            if(empty($address)){
                array_push($errors, "Enter Your Address");
               
            }
            if($_FILES['cv']['name'] == ""){
                array_push($errors, "Specify a file");
               
            }
             if(!$file['type'] == "pdf"){
                 array_push($errors, "file must be pdf");
               
             }
            if($errors){
                $_SESSION['errormsg'] = $errors;
                header("location:../userfiles/usersettings.php");
                exit();
               
            }else{

                 $update = new User;
                 if(empty($password)){
                    $checked = $update->update_without_password($phone, $email, $qualification, $address, $file, $experience, $_SESSION['user_id']);
                    if($checked){
                        $_SESSION['feedback'] = "Settings Updated Successfully";
                        header("location:../userfiles/dashboard.php");
                        exit();
                    }else{
                        $_SESSION['admin_errormsg'] = "Unable To input file please try again";
                        header("location:../userfiles/usersettings.php");
                        exit();
                    }
                    die();
                 }
                 $checked = $update->update($phone, $email, $password, $qualification, $address, $file, $experience, $_SESSION['user_id']);
                if($checked){
                    $_SESSION['feedback'] = "Settings Updated Successfully";
                    header("location:../userfiles/dashboard.php");
                    exit();
                }else{
                    $_SESSION['admin_errormsg'] = "Unable To input file please try again";
                    header("location:../userfiles/usersettings.php");
                    exit();
                }
            }
}else{
    header('location:../userfiles/usersettings.php');
}




?>