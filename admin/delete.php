<?php
session_start();
require_once "classes/Admin.php";
$admin = new Admin;
if($_POST['delete']){
$id = $_POST['id'];
$result = $admin->delete_jobseekers($id);
if($result){
    $_SESSION['feedback'] = 'Job Seeker Deleted Successfully';
    header('location:dashboard.php');
}else{
    $_SESSION['errormsg'] = 'Unable to delete';
    header('location:dashboard.php');
}

}elseif($_POST['deleteemp']){
    $id = $_POST['id'];
    $status = $_POST['status'];
$result = $admin->block_employer($status, $id);
if($result){
    if($status ==1){
        $_SESSION['feedback'] = 'Employer Enabled Successfully';
    }else{
        $_SESSION['errormsg'] = 'Employer Disabled Successfully';
    }
    
    header('location:dashboard.php');
}else{
    $_SESSION['errormsg'] = 'Unable to delete';
    header('location:dashboard.php');
}
    
}elseif($_POST['deleteadmin']){
    
    $id = $_POST['id'];
$result = $admin->delete_admin($id);
if($result){
    $_SESSION['feedback'] = 'Admin Deleted Successfully';
    header('location:dashboard.php');
}else{
    $_SESSION['errormsg'] = 'Unable to delete';
    header('location:dashboard.php');
}
}elseif($_POST['deleteapp']){
    $id = $_POST['id'];
    $result = $admin->delete_application($id);
    if($result){
        $_SESSION['feedback'] = 'Application Deleted Successfully';
        header('location:dashboard.php');
    }else{
        $_SESSION['errormsg'] = 'Unable to delete';
        header('location:dashboard.php');
    }


}elseif($_POST['deleteapp2']){
    $id = $_POST['id'];
    $result = $admin->delete_jobVacancy($id);
    if($result){
        $_SESSION['feedback'] = 'Job application Deleted Successfully';
        header('location:../employerfiles/viewapplications.php');
    }else{
        $_SESSION['errormsg'] = 'Unable to delete';
        header('location:dashboard.php');
    }


}else{
    header('location:dashboard.php');

}
