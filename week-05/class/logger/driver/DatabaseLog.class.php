<?php
namespace logger\driver; // logger\driver namespace

use database\Database;
use database\engine\DriverI;

class DatabaseLog implements LogDriverI
{
    private Database $db;

    public function __construct(
        private DriverI $driver
    )
    {
        $this->setUp();
    }

    public function setDriver(Driver $driver): void // Set Driver with given driver name
    {
        $this->driver = $driver;
    }

    public function setUp(): void // Set DB
    {
        $this->db = new \database\Database();
    }

    public function log(string $message, int $level): void // Log with given message and level
    {
        $created_at = date("Y-m-d H:i:s");

        $this->db->create("logs",[
            "message" => ($message),
            "level" => ($level),
            "created_at" => ($created_at)
            ]);

        $this->tearDown();
    }

    public function tearDown(): void // Set DB as null
    {
        $this->db = null;
    }
}

