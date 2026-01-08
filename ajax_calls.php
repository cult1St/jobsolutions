<?php

require_once 'classes/ORM.php';
require_once 'classes/Sanitizer.php';
require_once 'classes/Mail.php';

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
    // Send acknowledgment email to the user
    $ackSubject = 'Thank you for contacting JobSolutions';
    $ackMessage = "
    <html>
    <head>
        <title>Message Received</title>
    </head>
    <body>
        <h2>Thank you for contacting JobSolutions</h2>
        <p>Dear $name,</p>
        <p>We have received your message and will get back to you as soon as possible.</p>
        <p><strong>Your message details:</strong></p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
        <p>Best regards,<br>JobSolutions Support Team</p>
    </body>
    </html>
    ";
    
    Mail::to($email, $name)->send($ackSubject, $ackMessage);
    
    // Send full details to company email
    $companySubject = 'New Contact Form Submission';
    $companyMessage = "
    <html>
    <head>
        <title>New Contact Message</title>
    </head>
    <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
        <p><strong>Received at:</strong> " . date('Y-m-d H:i:s') . "</p>
    </body>
    </html>
    ";
    
    Mail::to('support@jobsolutions.com', 'JobSolutions Support')->send($companySubject, $companyMessage);
    
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