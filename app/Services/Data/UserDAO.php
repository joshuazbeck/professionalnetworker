<?php
/*
 * Group 1 Milestone 1
 * SecurityService.php Version 1
 * CST-256
 * 4/16/2021
 * This class is a data access object designed to handle database transactions concerning Users.
 */
namespace App\Services\Data;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserDAO
{
    // Function for adding user to database. Takes UserModel as argument and returns boolean
    public function addUser(UserModel $newUser): bool
    {
        // Connect to database
        $db = new DatabaseConfig();
        $connection = $db->getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO users (first_name, last_name, email, password, username) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from UserModel
        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();
        $username = $newUser->getUsername();

        // Bind parameters
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $username);

        // Execute and return boolean
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Function for checking database for an email address. Takes string as argument and returns boolean.
    public function findEmail($email): bool
    {
        // Connect to database
        $db = new DatabaseConfig();
        $connection = $db->getConnection();

        // Prepare SQL string and bind parameters
        $sql_query = "SELECT EMAIL FROM users WHERE EMAIL = ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $email);

        // Execute query and return results
        $stmt->execute();
        $result = $stmt->get_result();

        // Check results. Return true for results and false for none.
        if (!$result || $result->num_rows == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    // Function for checking database for existing username. Takes string as argument and returns boolean.
    public function findUsername($username): bool
    {
        // Connect to database
        $db = new DatabaseConfig();
        $connection = $db->getConnection();

        // Prepare SQL string and bind parameters
        $sql_query = "SELECT USERNAME FROM users WHERE USERNAME = ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $username);

        // Execute query and return results
        $stmt->execute();
        $result = $stmt->get_result();

        // Check results. Return true for results and false for none.
        if (!$result || $result->num_rows == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    // Function for adding a user to database with built in Laravel Connection.
    public function addUserLaravel(UserModel $newUser): bool
    {
        // Retrieve user inputs from UserModel
        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();
        $username = $newUser->getUsername();

        $results = DB::insert('INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, USERNAME) VALUES (?,?,?,?,?)', [$firstname, $lastname, $email, $password, $username]);

        return $results;
    }

    // Function for checking database for existing email address. Takes a string argument and returns a boolean.
    public function findEmailLaravel($email): bool
    {
        // Query users table for email address. Returns one result.
        $user = DB::table('users')->where('EMAIL', $email)->first();

        // Check if NULL
        if ($user)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
