<?php

require_once 'classes/ORM.php';
require_once 'classes/Sanitizer.php';

//validate fields
$name = sanitizer($_POST['name'] ?? '');
$email = sanitizer($_POST['email'] ?? '');
$subject = sanitizer($_POST['subject'] ?? '');
$message = sanitizer($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'message' => 'All Fields Required Correctly'
    ]);
    exit;
}
try {

    //insert
    $insert = ORM::table('contact')->insert([
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'created_at' => date('Y-m-d H:i:s')
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'An Error Occurred: ' . $e->getMessage()
    ]);
    exit;
}

if ($insert) {
    echo json_encode([
        'success' => true,
        'message' => 'Message Received Successfully'
    ]);
    exit;
}

echo json_encode([
    'success' => false,
    'message' => 'Unable To Send Message, An Error Occurred '
]);
exit;