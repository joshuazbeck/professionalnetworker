<?php
/*
 * Group 1 Milestone 1
 * SecurityDAO.php Version 1
 * CST-256
 * 4/16/2021
 * This class is a data access object for handling database transactions regarding user login.
 */
namespace App\Services\Data;

use App\Models\UserModel;
use App\Models\LoginModel;

class SecurityDAO
{

    // Authenticates a user login attempt. Takes LoginModel as argument and returns a UserModel or NULL
    public static function authenticateUser(LoginModel $loginModel): ?UserModel
    {
        // Get variables from login attempt
        $email = $loginModel->getEmail();
        $password = $loginModel->getPassword();

        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM users WHERE email LIKE ?";
        $stmt = $connection->prepare($sql_query);
        $stmt->bind_param("s", $email);

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
            $user = $result->fetch_assoc();

            $returnedUser = new UserModel($user["FIRST_NAME"], $user["LAST_NAME"], $user["EMAIL"], $user["PASSWORD"]);
            $returnedUser->setUserID($user['USER_ID']);
            $returnedUser->setSuspended($user['SUSPENDED']);
            $returnedUser->setUserRole($user['ROLE_ID']);
            $returnedUser->setProfileComplete($user['PROFILE_COMPLETE']);

            // Get retrieved password
            $password_hash = $returnedUser->getPassword();

            // Check password hash
            $passwordCheck = password_verify($password, $password_hash);

            // Return UserModel if password check true, else return NULL.
            if ($passwordCheck)
            {
                return $returnedUser;
            }
            else
            {
                return null;
            }
        }
    }
}
