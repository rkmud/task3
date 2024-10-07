<?php

namespace App\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger {
    
    private $logFile;
    private $channel;

    public function __construct($channel = 'console', $logFile = 'app.log') {
        $this->channel = $channel;
        $this->logFile = $logFile;
    }

    public function log($level, $message, array $context = []) {
        $message = $this->interpolate($message, $context);
        $logMessage = strtoupper($level) . ': ' . $message;

        if ($this->channel === 'file') {
            file_put_contents($this->logFile, $logMessage . PHP_EOL, FILE_APPEND);
        } else {
            echo $logMessage . PHP_EOL;
        }
    }
    
    public function error($message, array $context = []) {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = []) {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function info($message, array $context = []) {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = []) {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
    
    private function interpolate($message, array $context = []) {
        $replace = [];
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }
    
        return strtr($message, $replace);
    }
}
