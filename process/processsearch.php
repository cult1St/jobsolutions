<?php
session_start();
    if(isset($_POST["searchbtn"])){
        $jobcatid = $_POST['jobcat'];
        $name = "%".$_POST['jobname']."%";
        $name = strtolower($name);
        $state = $_POST['state'];
        require_once "../classes/User.php";
        $user1 = new User;
        $user2 = $user1->fetch_vacancies_for_users2($jobcatid, $state, $name);
        $_SESSION['search'] = $user2;
        header('location:../employeepage.php');


    }else{
        $_SESSION['errormsg'] = 'Fill The Form First';
        header('location:../index.php');
    }






?>