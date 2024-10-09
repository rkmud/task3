<?php

require 'vendor/autoload.php'; 
require './Mail/EmailSender.php';

use App\Mail\EmailSender;

$emailSender = new EmailSender();

$to = 'example@gmail.com'; 
$subject = 'Reminder';
$messageType = 'reminder'; 

$emailSender->send($to, $subject, $messageType);