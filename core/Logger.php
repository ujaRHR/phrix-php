<?php

namespace Core;

class Logger
{
    protected static $logFile = __DIR__ . '/../public/storage/logs/app.log';

    public static function info($message)
    {
        self::writeLog('INFO', $message);
    }

    public static function error($message)
    {
        self::writeLog('ERROR', $message);
    }

    protected static function writeLog($level, $message)
    {
        $date = date('Y-m-d H:i:s');
        $formatted = "[$date][$level] $message" . PHP_EOL;

        file_put_contents(self::$logFile, $formatted, FILE_APPEND);
    }
}
