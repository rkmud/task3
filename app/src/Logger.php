<?php

namespace App\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Stringable;

class Logger implements LoggerInterface {
    
    private $logFile;
    private $channel;

    public function __construct($channel = 'console', $logFile = 'app.log') {
        $this->channel = $channel;
        $this->logFile = $logFile;
    }

    public function log($level, $message, array $context = []): void {
        $message = $this->interpolate($message, $context);
        $logMessage = strtoupper($level) . ': ' . $message;

        if ($this->channel === 'file') {
            file_put_contents($this->logFile, $logMessage . PHP_EOL, FILE_APPEND);
        } else {
            echo $logMessage . PHP_EOL;
        }
    }

    public function emergency(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }
    public function notice(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::NOTICE, $message, $context);
    }
    public function alert(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }
    public function error(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function info(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug(string|\Stringable $message, array $context = []): void {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
    
    private function interpolate($message, array $context = []): string {
        $replace = [];
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }
    
        return strtr($message, $replace);
    }
}
