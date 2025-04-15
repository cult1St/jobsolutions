<?php
if($_POST){
    $stats =  $_POST['stats'];
    $id = $_POST['id'];
   
require_once "../../classes/Employer.php";
$emp = new Employer;
$status = $emp->change_status($stats, $id);
if($status){
   if($stats==1){
    echo json_encode(array("status"=> false,"message"=> "Application Declined"));
   }else{
    echo json_encode(array("status"=> true,"message"=> "Application Accepted"));
   }
}else{
    echo json_encode(array("status"=> false,"message"=> "unable to update application"));
}
}