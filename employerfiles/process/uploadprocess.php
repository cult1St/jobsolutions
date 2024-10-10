<?php
session_start();
    if($_POST['submit']){
        
        
       
        $userid = $_SESSION["useronline"];
        require_once "../../classes/Sanitizer.php";
        require_once "../../classes/Employer.php";
        $role = strtolower(sanitizer($_POST["role"]));
        $qualification = sanitizer($_POST["qualification"]);
        $range = sanitizer($_POST["low"])."-".sanitizer($_POST['high']);
        $type = sanitizer($_POST['worktype']);
        $date = sanitizer($_POST['closingdate']);
        $description = strtolower(sanitizer($_POST['desc']));
        $cat = $_POST['cat'];
        $state = $_POST['states'];
        $lga = $_POST['lga'];
        $dateentered = strtotime($date);
        $curdate = strtotime(date('Y-m-d'));
        $requirement = isset($_POST['req']) ? $_POST['req'] : "";
        if(empty($role) || empty($qualification) || empty($range) || empty($type) || empty($date) || empty($description) || empty($cat) || empty($state) || empty($lga)){
            $_SESSION["errormsg"] = "All Fields Required";
            header("location:../uploadjob.php");
            die();
        }
        if($dateentered< $curdate){
            $_SESSION["errormsg"] = "Invalid date, Choose a future date please";
            header("location:../uploadjob.php");
            die();
        }
        $employer1 = new Employer;
        $post = $employer1->post_job($role, $qualification, $userid, $date, $description, $range, $cat, $type, $state, $lga);
        if($post){
            foreach($requirement as $req){
                $insert = $employer1->insert_req($post, $req);
           }
            $_SESSION['feedback'] = "Job Posted Successfully";
            header("location:../employerdashboard.php");
        }else{
            $_SESSION["errormsg"] = "Unable to upload";
            header("location:../uploadjob.php");
        }





    }else{
        $_SESSION["errormsg"] = "Use the form";
        header("location:../uploadjob.php");


    }


























?>