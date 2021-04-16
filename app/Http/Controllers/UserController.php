<?php
/*
 * Group 1 Milestone 1
 * UserController.php Version 1
 * CST-256
 * 4/16/2021
 * This is a User Controller class for handling all requests concerning the UserModel.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\UserService;

class UserController extends Controller
{
    // Function for adding a new user to the database. Takes POST data as argument
    public function addUser(Request $request)
    {
        // New UserService
        $userService = new UserService();

        // Retrieve all user form inputs and clean against SQL injection.
        $firstname = $this->clean_input($request->input('firstname'));
        $lastname = $this->clean_input($request->input('lastname'));
        $username = $this->clean_input($request->input('username'));
        $email = $this->clean_input($request->input('email'));
        $password = $this->clean_input($request->input('password'));

        // Check database for duplicate email address or duplicate Username. Both return boolean.
        $checkEmail = $userService->findEmail($email);
        $checkUsername = $userService->findUsername($username);

        // Check for valid username
        if ($checkUsername)
        {
            // Do something if invalid
            echo "Username not available";
        }
        // Check for valid email address
        elseif ($checkEmail)
        {
            // Do something if invalid
            echo "Email address already registered";
        }
        // Attempt to register user
        else
        {
            // Hash the password
            $hash = password_hash(trim($password), PASSWORD_DEFAULT);
            // Create a new UserModel with form data
            $user = new UserModel($firstname, $lastname, $username, $email, $hash);
            // Register user with UserService addUser Method. Returns boolean.
            $registeredUser = $userService->addUser($user);

            // Check if registration was valid
            if ($registeredUser)
            {
                // Do something if valid.
                echo "User Registered";
            }
            else
            {
                // Do something if invalid
                echo "There was a problem registering users";
            }
        }
    }

    // Function for clearing user inputs against SQL injection
    function clean_input($inputData): string
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }
}
