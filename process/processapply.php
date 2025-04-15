<?php
session_start();
if($_POST['button']){
    $jobVacancyId = $_POST['jobVid'];
    $jobSeekerId = $_POST['jobSid'];
    $cv = $_FILES['cv'];
   
    if(empty($cv)){
        $_SESSION['errormsg'] = 'Please Input A file';
        header('location:../userfiles/dashboard.php');
        die();
    }
    $type = strtolower($cv['type']);

    $types = ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "text/csv"];
    if(!in_array($type, $types)){
        $_SESSION['errormsg'] = 'Unsupported file';
        header('location:../userfiles/dashboard.php');
        die();
    }

    //if($cv[''])
    require_once "../classes/User.php";
    $user = new User;
    $apply = $user->apply($jobVacancyId, $jobSeekerId, $cv);
    if($apply){
        $_SESSION["feedback"] = "Application Submitted Successfully";
        header("location:../userfiles/dashboard.php");
    }else{
        $_SESSION['errormsg'] = 'Already applied for the job';
       // $_SESSION["errormsg"] = "Sorry, Unable to Submit, Please Try Again";
        header("location:../userfiles/dashboard.php");
    }

}



?>