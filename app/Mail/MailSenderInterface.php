<?php

declare(strict_types=1);

namespace App\Mail;

interface MailSenderInterface 
{
    public function send(string $to, string $subject, string $messageType): void;
}