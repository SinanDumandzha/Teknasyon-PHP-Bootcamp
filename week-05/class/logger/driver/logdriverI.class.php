<?php
namespace logger\driver; // logger\driver namespace

interface LogDriverI
{
    public function setUp(): void;
    public function log(string $message, int $level): void;
    public function tearDown(): void;
}
