<?php
/*
 * Group 1 Milestone 2
 * SecurityService.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a data access object designed to handle database transactions concerning Users.
 */
namespace App\Services\Data;

use App\Models\UserModel;

class UserDAO
{
    // Function for returning an array of all Users.
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
        }
        // Retrieve user data and verify password
        else
        {
            // Array to hold results
            $user_array = array();

            // Step through results and create new UserModel
            while ($user = $result->fetch_assoc())
            {
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
        if (! $result || $result->num_rows == 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    // Function for updating the status of user completing a Profile. Takes userID and boolean as arguments. Returns boolean
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
        else
        {
            return false;
        }
    }

    // Function to delete user by their User ID. Takes User ID as argument.
    public static function deleteUserById($id): bool
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
        else
        {
            return false;
        }
    }

    // Function for getting a User by their ID. Takes User ID as argument and returns UserModel
    public static function getUserById($id): ?UserModel
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM users WHERE USER_ID LIKE ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("i", $id);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve user data and verify password
        else
        {
            // Get associative array of results
            $user = $result->fetch_assoc();

            // Create UserModel from results

            $returnedUser = new UserModel($user["FIRST_NAME"], $user["LAST_NAME"], $user["EMAIL"], $user["PASSWORD"], $user['USER_ID'], $user['ROLE_ID'], $user['SUSPENDED'], $user['PROFILE_COMPLETE']);

            return $returnedUser;
        }
    }

    // Function for updating a User. Takes UserModel as argument and returns boolean.
    public static function updateUser(UserModel $user): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE users SET FIRST_NAME=?, LAST_NAME=?, EMAIL=?, ROLE_ID=?, SUSPENDED=? WHERE USER_ID=?";
        $stmt = $connection->prepare($sql_query);

        // Get User information from input
        $firstname = $user->getFirstName();
        $lastname = $user->getLastName();
        $email = $user->getEmail();
        $role = $user->getUserRole();
        $suspended = $user->getSuspended();
        $user_id = $user->getUserID();

        // Bind parameters
        $stmt->bind_param("sssiii", $firstname, $lastname, $email, $role, $suspended, $user_id);

        // Execute statement and return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
