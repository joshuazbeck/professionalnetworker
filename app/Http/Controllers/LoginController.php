<?php
namespace App\Http\Controllers;

/*
 * Group 1 Milestone 1
 * LoginController.php Version 1
 * CST-256
 * 4/16/2021
 * This is a Login Controller class for handling login requests.
 */
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use App\Models\LoginModel;

class LoginController extends Controller
{

    // Method for logging in a user. Takes POST data as an argument.
    public function login(Request $request)
    {

        // Retrieve user form inputs and clean against SQL Injection
        $email = $this->clean_input($request->input('email'));
        $password = $this->clean_input($request->input('password'));

        // Create new UserModel for authentication
        $loginModel = new LoginModel($email, $password);

        // Create new Security service and call authenticateUser. Returns a UserModel or Null
        $securityService = new SecurityService();
        $user = $securityService->authenticateUser($loginModel);

        // CHeck if $user is null. If not, set Session variables to those of logged in user.
        if ($user) {
            // Set variables
            session([
                'email' => $user->getEmail()
            ]);
            session([
                'fullName' => $user->getFirstName() . " " . $user->getLastName()
            ]);
            session([
                'userRole' => $user->getUserRole()
            ]);
            session([
                'userID' => $user->getUserID()
            ]);


            if ($user->getProfileComplete())
            {
                return redirect('/');
            }
            else{
                return view('setupprofile');
            }
        } else {
            // Do something if login failed.
            return "Problem with username or password";
        }
    }

    function log_out(){
        session()->flush();
        return redirect('login');
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
