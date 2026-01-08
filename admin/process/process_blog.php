<?php

session_start();
//include includables
require_once "../classes/General.php";
require_once "../classes/ORM.php";

//sanitize input
if (!isset($_POST['submit']) || !$_POST['submit']) {
    die("Not Allowed");
}



//get inputs
$title = General::sanitize($_POST['title'] ?? '');
$content = General::sanitize($_POST['desc'] ?? '');
$id = General::sanitize($_POST['id'] ?? '');
if (empty($title) || empty($content)) {
    $_SESSION['errormsg'] = 'All Fields Are Required';
    header("location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

if (!$id) {
    //insert into db
    $save = ORM::table('blogs')->insert([
        "title" => $title,
        "content" => $content,
        "created_by" => $_SESSION['adminonline']
    ], true);
} else {
    $save = ORM::table('blogs')->update([
        "title" => $title,
        "content" => $content,
    ], [
        "id" => $id
    ], true);
}

if (!$save) {
    $_SESSION['errormsg'] = 'An Error Occurred, unable to add blog';
    header("location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

$_SESSION['feedback'] = 'Blog Post '.($id ? 'Updated': 'Created').' Successfully';
header("location: ../blogs.php");