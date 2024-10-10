<?php
session_start();
require_once "../classes/Admin.php";
$admin = new Admin;
if($_POST){
    $id = $_POST['id'];
    $status = $_POST['status'];
$result = $admin->block_employer($status, $id);
if($result){
    if($status ==1){
       echo json_encode(array('success'=> true,'msg'=> 'Employer Enabled Successfully'));
    }else{
        echo json_encode(array('success'=> false,'msg'=> 'Employer Disabled Successfully'));
    }
}else{
    echo json_encode(array('success'=> false,'msg'=> 'Unable to Update'));
}
   
}else{
    header("location:../dashboard.php");
}