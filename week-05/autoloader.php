<?php
set_error_handler(function ($error_level, $error_message, $error_file, $error_line)
{
    $error = "lvl: " . $error_level . " | msg:" . $error_message . " | file:" . $error_file . " | ln:" . $error_line;
    $log = new \logger\logger();
    $log::log($error, $error_level);
});

register_shutdown_function(function ()
{
    $error = error_get_last();
    if (is_array($error))
    {
        $log = new \logger\logger();
        $log::log("lvl: ".$error['type']." | msg:".$error['message'], $error['type']);
    }
});

spl_autoload_register(function ($class)
{
    $class = str_replace("\\", "/", $class);
    $classess = __DIR__ . "/class/";
    $classPath = $classess . $class . ".class.php";
    $databasePath = $classess . "database/" . $class . ".class.php";
    
    if (file_exists($classPath))
    {
        include $classPath;
    }
});

