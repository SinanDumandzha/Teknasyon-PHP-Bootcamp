<?php
namespace logger; // logger namespace

use database\Database;
use logger\driver\{
    DatabaseLog,
    FileLog,
    LogDriverI
};
use logger\loggableI;

class logger implements loggableI
{
    protected LogDriverI $logdriver;

    public function __construct()
    {
        $logging = "null";
        $configdir = (__DIR__)."/../../config.php";
        
        if (file_exists($configdir)) // If file exist in $configdir
        {
            $this->config = require $configdir;
            $logging= $this->config["logging"];
        }

        if ($logging == "database") // logging değeri database ise
        {
            $this->logdriver = new DatabaseLog(new Database());
        }
        elseif ($logging == "file")
        {
            $this->logdriver = new FileLog();
        }
        elseif ($logging == "null")
        {
            return;
        }

        $this->setDriver($this->logdriver);
    }

    public function setDriver(LogDriverI $logdriver):void // Set driver with given $logdriver
    {
        $this->logdriver = $logdriver;
    }

    public static function log(string $message, int $level):void // Log message and level with given level
    {
        $log = new static();

        if (isset($log->logdriver))
        {
            $log->logdriver->log($message, $level);
        }
    }
}
