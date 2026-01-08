<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

class Mail
{
    private string $email;
    private ?string $name;
    private ?string $sender;

    private function __construct(string $email, ?string $name = null, ?string $sender = null)
    {
        $this->email  = $email;
        $this->name   = $name;
        $this->sender = $sender;
    }

    /**
     * Create a new Mail instance
     */
    public static function to(string $email, ?string $name = null, ?string $sender = null): self
    {
        return new self($email, $name, $sender);
    }

    /**
     * Send the email
     */
    public function send(string $subject, string $message): bool
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'] ?? 'momoduwealth2@gmail.com';
            $mail->Password   = $_ENV['MAIL_PASSWORD'] ?? 'app-password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom(
                $this->sender ?? 'momoduwealth2@gmail.com',
                'Momodu Wealth'
            );

            $mail->addAddress(
                $this->email,
                $this->name ?? 'Website Visitor'
            );

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = strip_tags($message);

            $mail->send();
            return true;

        } catch (Exception $e) {
            error_log('Mail error: ' . $mail->ErrorInfo);
            return false;
        }
    }
}
