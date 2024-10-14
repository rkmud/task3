<?php

declare(strict_types=1);

namespace App\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface {
    
    public function __construct( private string $channel = 'console', private string $logFile = 'app.log') {}

    public function log($level, string|\Stringable $message, array $context = []): void 
    {
        $message = $this->interpolate($message, $context);
        $logMessage = sprintf('%s: %s', strtoupper($level), $message);

        if ($this->channel !== 'file') {
            echo $logMessage . PHP_EOL;
        }
        
        file_put_contents($this->logFile, $logMessage . PHP_EOL, FILE_APPEND);
    }

    public function emergency(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function notice(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function alert(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function info(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug(string|\Stringable $message, array $context = []): void 
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
    
    private function interpolate($message, array $context = []): string 
    {
        $replace = [];
        foreach ($context as $key => $val) {
            $key = sprintf('{%s}', $key);
            $replace[$key] = $val;
        }
    
        return strtr($message, $replace);
    }
}