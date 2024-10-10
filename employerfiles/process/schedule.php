<?php
session_start();
require_once "../../classes/Employer.php";
require_once "../../classes/Interview.php";
$inter = new Interview;
$data = new Employer();
if($_POST['submit']){

    $app_id = $_POST['application_id'];
    $application = $data->get_app_by_id($app_id);
    $emp_id = $_POST['emp_id'];
    $employer = $data->get_user_by_id($application['jobVacancy_employerId']);
    $company_name = $employer['employer_companyName'];
    $user = $data->get_js_by_id($application['application_jobSeeker_id']);
    $emp_email = $employer['employer_email'];
    $email = $user['jobSeeker_email'];
    $vacancy = $application['jobVacancy_title'];
    $user_name = $user['jobSeeker_firstName']. " ". $user['jobSeeker_lastName'];
    $location = $_POST['location'];
    $date = date("d-M-Y",strtotime($_POST['date']));
    $time = date("h:i A",strtotime($_POST['time']));
    $message = "<p>Dear <b>$user_name,</b></p>

    <p>Thank you for applying for the <b>$vacancy position</b> at <b>$company_name</b>. We have reviewed your application. We would like to invite you for an interview to further discuss your potential fit for our team.</p>

    <p>Interview Details:</p>

    <p>Date: $date</p>
    <p>Time: $time </p>
    <p>Location: $location.</p>

   <p> Please confirm your availability for the interview by replying to this email at your earliest convenience. If the suggested date and time do not work for you, kindly propose alternative slots to this email <a href='mailto:".$emp_email."'>$emp_email</a>, and we will do our best to accommodate you.

    We look forward to meeting you and discussing how your skills and experiences align with our needs.</p>


    <p>Best regards,</p>

    <h4>The Job Solutions Team</h4>
    <p>Please do not reply as tis is a default email</p>

    
    ";
    $send = $inter->send_message_mailer($email, $message, $user_name);
    if($send==true){
        $_SESSION['feedback'] = "Interview Scheduled successfully";
        
        header('location:../viewapplications.php');
        exit();
    }else{
        $_SESSION['errormsg'] = "Unable to schedule interview due to poor connection. Try scheduling manually please. Thank You";
        header('location:../viewapplications.php');
        exit();
    }
}else{
    $_SESSION['errormsg'] = "Pass Through the form please. Thank You";
    header('location:../details.php');
}