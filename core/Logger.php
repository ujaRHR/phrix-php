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
        $logDir = dirname(self::$logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $date = date('Y-m-d H:i:s');
        $formatted = "[$date][$level] $message" . PHP_EOL;

        if (!file_exists(self::$logFile)) {
            touch(self::$logFile);
            chmod(self::$logFile, 0666);
        }

        file_put_contents(self::$logFile, $formatted, FILE_APPEND);
    }
}
