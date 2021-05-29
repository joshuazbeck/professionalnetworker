<?php
/*
 * Group 1 Milestone 2
 * LoginController.php Version 2
 * CST-256
 * 4/24/2021
 * This is a Login Controller class for handling login requests.
 */

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Data\DatabaseConfig;
use App\Services\Utility\ILogger;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    // Variable to hold Logger
    protected $logger;

    // Constructor that creates a logger
    public function __construct(ILogger $iLogger)
    {
        $this->logger = $iLogger;
    }

    // Method for logging in a user. Takes POST data as an argument.
    public function login(Request $request)
    {
        $this->logger->info("Entering LoginController::Index()");

        $this->validateForm($request);

        // Retrieve user form inputs and clean against SQL Injection
        $email = $this->clean_input($request->input('email'));
        $password = $this->clean_input($request->input('password'));

        $this->logger->info("Attempting login for user: ", array('email'=> $email));

        // Create new UserModel for authentication
        $loginModel = new LoginModel($email, $password);

        // Call SecurityService class and use authenticateUser. Returns a UserModel or Null
        $user = SecurityService::authenticateUser($loginModel);

        // CHeck if $user is null. If not, set Session variables to those of logged in user.
        if ($user) {
            // Set session variables
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
            session([
                'loggedIn' => true
            ]);

            if($user->getSuspended() == true)
            {
                $this->logger->info("Exiting LoginController. User Suspended Status");
                return redirect('logout');
            }

            // Check if user has completed profile. If true, redirect to home. If False setup profile
            if ($user->getProfileComplete())
            {
                $this->logger->info("Exiting LoginController. Login Successful");
                return redirect('/');
            }
            else
            {
                $this->logger->info("Exiting LoginController. Redirect to create profile");
                return view('profiles/setupprofile');
            }
        }
        // If no user, return error
        else
        {
            $this->logger->info("Exiting LoginController. Login Failed");

            return back()
                ->withInput()
                ->withErrors(['info' => 'Username or Password not found']);
        }
    }

    // Function for logging off a user by deleting the session data.
    function log_out(){
        session()->flush();
        return redirect('login');
    }

    // Function for clearing user inputs against SQL injection
    private function clean_input($inputData): string
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }

    private function validateForm(Request $request)
    {
        // Set rules for validation and cell validate on inputs
        $rules = ['email'=> 'Required | email', 'password'=>'Required'];
        $this->validate($request, $rules);
    }
}
