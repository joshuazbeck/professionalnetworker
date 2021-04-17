<?php
namespace App\Http\Controllers;

/*
 * Group 1 Milestone 1
 * LoginController.php Version 1
 * CST-256
 * 4/16/2021
 * This is a Login Controller class for handling login requests.
 */
use App\HTTP\Controllers\SecurityService;
use Illuminate\Http\Request;
use App\Models\LoginModel;

class LoginController extends Controller
{

    // Method for logging in a user. Takes POST data as an argument.
    public function login(Request $request)
    {

        // Retrieve user form inputs and clean against SQL Injection
        $username = $this->clean_input($request->input('username'));
        $password = $this->clean_input($request->input('password'));

        // Create new UserModel for authentication
        $loginModel = new LoginModel($username, $password);

        // Create new Security service and call authenticateUser. Returns a UserModel or Null
        $securityService = new SecurityService();
        $user = $securityService->authenticateUser($loginModel);

        // CHeck if $user is null. If not, set Session variables to those of logged in user.
        if ($user) {
            // Set variables
            session([
                'username' => $user->getUserName()
            ]);
            session([
                'userID' => $user->getUserID()
            ]);

            // Do something post login
            echo "Username: " . session('username') . " User ID: " . session('userID') . " Logged in";
        } else {
            // Do something if login failed.
            echo "Problem with username or password";
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
