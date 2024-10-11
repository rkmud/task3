<?php

require 'vendor/autoload.php';
require './Logger/Logger.php';

use App\Logger\Logger;

$fileLogger = new Logger('file', 'appplication.log');
$fileLogger->info('User {username} created.', ['username' => 'qwerty']);

$consoleLogger = new Logger();
$consoleLogger->info('User {username} created.', ['username' => 'qwerty']);
$consoleLogger->debug('This is a debug message.');
$consoleLogger->error('An error occurred!');
