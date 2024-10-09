<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class EmailSender {

    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com'; 
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'ustsiniya.korbut@innowise.com'; 
        $this->mailer->Password = 'ogpl jwao stzt akmr'; 
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = 587;
        $this->mailer->setFrom('ustsiniya.korbut@innowise.com'); 
    }

    public function send($to, $subject, $messageType)
    {
        try {
            $message = $this->createMessage($messageType);

            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $message;
            $this->mailer->isHTML(true); 
            $this->mailer->send();
            echo "Email sent successfully!";
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$this->mailer->ErrorInfo}";
        }
    }

    private function createMessage($messageType)
    {
        switch ($messageType) {
            case 'welcome':
                return $this->getWelcomeMessage();
            case 'reminder':
                return $this->getReminderMessage();
            case 'notification':
                return $this->getNotificationMessage();
            default:
                return 'This is a default message.';
        }
    }

    private function getWelcomeMessage()
    {
        return 'Welcome! Thank you.';
    }

    private function getReminderMessage()
    {
        return 'This is a reminder letter.';
    }

    private function getNotificationMessage()
    {
        return 'You have a new notification.';
    }
}