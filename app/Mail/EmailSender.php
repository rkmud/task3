<?php

declare(strict_types=1); 

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Psr\Log\LoggerInterface;
use App\Mail\MailSenderInterface;

require './Mail/MailSenderInterface.php';

class EmailSender implements MailSenderInterface {

    private static ?PHPMailer $mailer= null; 
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
        self::$mailer = self::getMailer();
    }


    public static function getMailer(): PHPMailer
    {
        if(self::$mailer === null) {
            self::$mailer = new PHPMailer(true);
            self::$mailer->isSMTP();
            self::$mailer->Host = 'smtp.gmail.com'; 
            self::$mailer->SMTPAuth = true;
            self::$mailer->Username = 'ustsiniya.korbut@innowise.com'; 
            self::$mailer->Password = 'ogpl jwao stzt akmr'; 
            self::$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            self::$mailer->Port = 587;
            self::$mailer->setFrom('ustsiniya.korbut@innowise.com'); 
        }
        return self::$mailer;
    }

    public function send(string $to, string $subject, string $messageType): void
    {
        try {
            $message = $this->createMessage($messageType);

            self::$mailer->addAddress($to);
            self::$mailer->Subject = $subject;
            self::$mailer->Body = $message;
            self::$mailer->isHTML(true); 
            self::$mailer->send();
            $this->logger->info('Email sent successfully!');
        } catch (Exception $e) {
            $this->logger->error("Email could not be sent. Mailer Error: {$this->mailer->ErrorInfo}");
        }
    }

    private function createMessage(string $messageType): string
    {
        return match ($messageType) {
            'welcome' => $this->getWelcomeMessage(),
            'reminder' => $this->getReminderMessage(),
            'notification' => $this->getNotificationMessage(),
            default => 'This is a default message.',
        };
    }

    private function getWelcomeMessage(): string
    {
        return 'Welcome! Thank you.';
    }

    private function getReminderMessage(): string
    {
        return 'This is a reminder letter.';
    }

    private function getNotificationMessage(): string
    {
        return 'You have a new notification.';
    }
}