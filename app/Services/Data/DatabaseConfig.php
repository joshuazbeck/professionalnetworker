<?php
/*
 * Group 1 Milestone 1
 * DatabaseConfig.php Version 1
 * CST-256
 * 4/16/2021
 * This class is a service designed to create a mysqli database connection.
 */
namespace App\Services\Data;

use mysqli;

class DatabaseConfig
{

    // Database configuration
    private $dbServerName = "localhost";

    private $dbUserName = "root";

    private $dbPassword = "root";

    private $dbName = "cst256";

    // Get database connection and return it.
    function getConnection()
    {
        $conn = new mysqli($this->dbServerName, $this->dbUserName, $this->dbPassword, $this->dbName);

        if ($conn->connect_error) {
            return "Connection failed " . $conn->connect_error . "<br>";
        } else {
            return $conn;
        }
    }
}
