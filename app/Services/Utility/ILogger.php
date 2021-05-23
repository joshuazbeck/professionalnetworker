<?php
/*
 * Group 1 Milestone 6
 * ILogger.php Version 1
 * CST-256
 * 5/22/2021
 * This is a interface that provides functions for implementing a logger
 */
namespace App\Services\Utility;

interface ILogger
{
    // Log a debug message
    public function debug($message, $array=null);

    // Log a info message
    public function info($message, $array=null);

    // Log a warning message
    public function warning($message, $array=null);

    // Log a error message
    public function error($message, $array=null);
}
