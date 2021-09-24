<?php
namespace logger; // logger namespace

interface loggableI
{
    public static function log(string $message, int $level): void; // Log with given message and level

}