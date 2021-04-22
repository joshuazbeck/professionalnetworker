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
    public static function getAllUsers(): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM users";
        $stmt = $connection->prepare($sql_query);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        } // Retrieve user data and verify password
        else {
            // Array to hold results
            $user_array = array();

            // Step through results and create new UserModel
            while ($user = $result->fetch_assoc()) {
                $returnedUser = new UserModel($user["FIRST_NAME"], $user["LAST_NAME"], $user["EMAIL"], $user["PASSWORD"]);
                $returnedUser->setUserID($user['USER_ID']);
                $returnedUser->setSuspended($user['SUSPENDED']);
                $returnedUser->setUserRole($user['ROLE_ID']);
                $returnedUser->setProfileComplete($user['PROFILE_COMPLETE']);

                array_push($user_array, $returnedUser);
            }

            return $user_array;
        }
    }

    // Function for adding user to database. Takes UserModel as argument and returns boolean
    public static function addUser(UserModel $newUser): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from UserModelS
        $firstname = $newUser->getFirstname();
        $lastname = $newUser->getLastname();
        $email = $newUser->getEmail();
        $password = $newUser->getPassword();

        // Bind parameters
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);
        // Execute and return boolean
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Function for checking database for an email address. Takes string as argument and returns boolean.
    public static function findEmail($email): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string and bind parameters
        $sql_query = "SELECT EMAIL FROM users WHERE EMAIL = ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $email);

        // Execute query and return results
        $stmt->execute();
        $result = $stmt->get_result();

        // Check results. Return true for results and false for none.
        if (! $result || $result->num_rows == 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function updateProfileComplete($userID, $value): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE users SET PROFILE_COMPLETE=? WHERE USER_ID=?";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("ii", $value, $userID);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }

    public static function deleteUserById($id)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM users WHERE USER_ID=?";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("i", $id);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }

}
