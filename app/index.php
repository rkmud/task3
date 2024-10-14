<?php

require 'vendor/autoload.php'; 
require './Mail/EmailSender.php';
require './Logger/Logger.php';

use App\Mail\EmailSender;
use App\Logger\Logger;

$logger = new Logger();

$emailSender = new EmailSender($logger);

$to = 'ustkorbut@gmail.com'; 
$subject = 'Reminder';
$messageType = 'reminder'; 

$emailSender->send($to, $subject, $messageType);