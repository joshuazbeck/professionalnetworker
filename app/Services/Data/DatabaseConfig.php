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
    private $dbServerName = "cst256.mysql.database.azure.com";

    private $dbUserName = "cst256@cst256";

    private $dbPassword = "helloworld1!";

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
