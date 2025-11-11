<?php
session_start();

require_once "../classes/Employer.php";

$log = new Employer;
$log->logout();
//die('hello');
header('location:../employer.php');
exit;
?>