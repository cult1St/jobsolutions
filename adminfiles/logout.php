<?php
    error_reporting(E_ALL);
    session_start();
    require_once "classes/Admin.php";
    $logout = new Admin;
    $logout->logout();


?>