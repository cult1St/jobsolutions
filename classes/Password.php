<?php 

require_once "User.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class Password extends User
{

    public function send_message_mailer($email, $message){
        $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'momoduwealth2@gmail.com';                     //SMTP username
    $mail->Password   = 'rqcn suzx tzro xzha';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('jobsolutions@gmail.com', 'Mailer');
    $mail->addAddress($email, 'Website visitor');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password Reset';
    $mail->Body    = "<b>Dear $email </b> This is your code: $message; ensure you use it within 3 mins";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   return true;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        
    }
    public function get_user($email){
        $sql = "SELECT * FROM `job_seekers` WHERE jobSeeker_email = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute(array($email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $rand = $rand = rand(1,9). rand(1,9). rand(1,9). rand(1,9);
            $_SESSION['emailpassmsg']= $rand;
            $_SESSION['fp_user_id'] = $row['jobSeeker_id'];
            $message = $this->send_message_mailer($email, $rand);
            if($message){
                return true;
            }else{
                $_SESSION['errormsg'] = 'Unable to send to email';
                return false;
            }
        }else{
            $_SESSION['errormsg'] = 'Email not found';
        }
    }
    public function change_password($password, $id){
        $sql = 'UPDATE job_seekers SET jobSeeker_password = ? WHERE jobSeeker_id = ?';
        $stmt = $this->dbconn->prepare($sql);
        return $stmt->execute(array($password, $id));
        
    }
}