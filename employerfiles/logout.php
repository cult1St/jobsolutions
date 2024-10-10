<?php

require_once "../classes/Employer.php";

$log = new Employer;
$log->logout();
header('location:../employer.php');
exit;
?>