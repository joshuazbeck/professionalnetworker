<?php
/*
 * Group 1 Milestone 2
 * DatabaseConfig.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a service designed to create a mysqli database connection.
 */
namespace App\Services\Data;

use mysqli;

class DatabaseConfig
{
    // Get database connection and return it.
    public static function getConnection()
    {
        $conn = new mysqli("localhost", "root", "root", "cst256week5");

        if ($conn->connect_error) {
            return "Connection failed " . $conn->connect_error . "<br>";
        } else {
            return $conn;
        }
    }
}
