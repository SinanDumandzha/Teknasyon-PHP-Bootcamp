<?php
namespace logger\driver; // logger\driver namespace

class FileLog implements LogDriverI
{
    public function __construct(
        private string $logFile = "file.log";
    )
    {
        $this->setUp();
    }

    public function setLogFile(string $logFile): void // Set log file
    {
        $this->logFile = $logFile;
    }

    public function setUp(): void // Check and set up log file
    {
        if(!file_exists($this->logFile)) { 
            file_put_contents($this->logFile, " ------ Log File Created ------ ".PHP_EOL, FILE_APPEND); // 
        }
    }

    public function log(string $message, int $level): void // Log with given message and level
    {
        $created_at = date("Y-m-d H:i:s");
        $logText = $level." ".$created_at." ".$message.PHP_EOL;
        file_put_contents($this->logFile,$logText,FILE_APPEND);

        $this->tearDown();
    }

    public function tearDown(): void // Set as null
    {
        
    }
}

