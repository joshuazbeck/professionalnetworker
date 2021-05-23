<?php
/*
 * Group 1 Milestone 6
 * ProjectLogger.php Version 1
 * CST-256
 * 5/22/2021
 * This is a logger class that implements the ILogger interface. It uses the Laravel Log class to handle logging.
 */
namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class ProjectLogger implements ILogger
{
    // Log a debug level message. Takes string message and optional array of data.
    public function debug($message, $array=null)
    {
        if($array != null)
        {
            Log::debug($message, $array);
        }
        else
        {
            Log::debug($message);
        }
    }

    // Log a info level message. Takes string message and optional array of data.
    public function info($message, $array=null)
    {
        if($array != null)
        {
            Log::info($message, $array);
        }
        else
        {
            Log::info($message);
        }
    }

    // Log a warning level message. Takes string message and optional array of data.
    public function warning($message, $array=null)
    {
        if($array != null)
        {
            Log::warning($message, $array);
        }
        else
        {
            Log::warning($message);
        }
    }

    // Log a error level message. Takes string message and optional array of data.
    public function error($message, $array=null)
    {
        if($array != null)
        {
            Log::error($message, $array);
        }
        else
        {
            Log::error($message);
        }
    }
}
