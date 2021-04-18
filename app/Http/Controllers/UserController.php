<?php
namespace App\Http\Controllers;

/*
 * Group 1 Milestone 1
 * UserController.php Version 1
 * CST-256
 * 4/16/2021
 * This is a User Controller class for handling all requests concerning the UserModel.
 */
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
        $firstname = $this->clean_input($request->input('firstName'));
        $lastname = $this->clean_input($request->input('lastName'));
        $email = $this->clean_input($request->input('email'));
        $password = $this->clean_input($request->input('password'));
        $phoneNum = $this->clean_input($request->input('phoneNum'));
        $age = $this->clean_input($request->input('age'));
        $gender = $this->clean_input($request->input('selector'));
        $city = $this->clean_input($request->input('city'));
        $state = $this->clean_input($request->input('state'));

        // Check database for duplicate email address and return boolean.
        $checkEmail = $userService->findEmail($email);

        if ($checkEmail) {
            // Do something if invalid
            echo "Email address already registered";
        } // Attempt to register user
        else {
            // Hash the password
            $hash = password_hash(trim($password), PASSWORD_DEFAULT);
            // Create a new UserModel with form data
            $user = new UserModel($firstname, $lastname, $email, $hash, $phoneNum, $age, $gender, $city, $state);
            // Register user with UserService addUser Method. Returns boolean.
            $registeredUser = $userService->addUser($user);

            // Check if registration was valid
            if ($registeredUser) {
                // Do something if valid.
                echo "User Registered";
            } else {
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
