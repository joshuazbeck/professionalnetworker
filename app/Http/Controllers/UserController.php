<?php
/*
 * Group 1 Milestone 2
 * UserController.php Version 1
 * CST-256
 * 4/23/2021
 * This is a User Controller class for handling all User functions.
 */
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\EducationService;
use App\Services\Business\JobHistoryService;
use App\Services\Business\ProfileService;
use App\Services\Business\SkillService;
use App\Services\Business\UserService;
use App\Services\Utility\ILogger;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Variable to hold Logger
    protected $logger;

    // Constructor that creates a logger
    public function __construct(ILogger $iLogger)
    {
        $this->logger = $iLogger;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $this->logger->info("Entering UserController::index()");

        // Get array of all users from database
        $userArray = UserService::getAllUsers();

        $this->logger->info("Exiting UserController::index()");

        // Return view with Users array
        return view('users/displayUsers')->with('userArray', $userArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $this->logger->info("Entering UserController::create()");

        $this->logger->info("Exiting UserController::create()");

        return view('users/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->logger->info("Entering UserController::store()");

        // Call validate method to validate user inputs
        $this->validateForm($request);

        // Retrieve all user form inputs and clean against SQL injection.
        $firstname = $this->clean_input($request->input('firstName'));
        $lastname = $this->clean_input($request->input('lastName'));
        $email = $this->clean_input($request->input('email'));
        $password = $this->clean_input($request->input('password'));

        // Check database for duplicate email address and return boolean.
        $checkEmail = UserService::findEmail($email);

        if ($checkEmail) {

            $this->logger->info("Attempted to register with existing email", array('email' => $email));

            // Do something if invalid
            echo "Email address already registered";
        }
        // Attempt to register user
        else
        {
            // Hash the password
            $hash = password_hash(trim($password), PASSWORD_DEFAULT);
            // Create a new UserModel with form data
            $user = new UserModel($firstname, $lastname, $email, $hash);
            // Register user with UserService addUser Method. Returns boolean.
            $registeredUser = UserService::addUser($user);

            // Check if registration was valid
            if ($registeredUser)
            {
                $this->logger->info("User registered successfully", array('email'=>$email));
                $this->logger->info("Exiting UserController::store()");

                // Do something if valid.
               return redirect('login');
            }
            else
            {
                $this->logger->info("User registration unsuccessful");
                $this->logger->info("Exiting UserController::store()");

                // Do something if invalid
                return back()
                    ->withInput()
                    ->withErrors(['fail'=>'There was a problem registering the user']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {

        $this->logger->info("Entered UserController::edit()", array('loggedInUserID' => session('userID'), 'editedUserID' => $id));

        // Check if user is admin or trying to update a user other than themselves. Reroute to main page
        if(session('userRole') != 3 && session('userID') != $id)
        {
            $this->logger->info("Permission denied to edit user id");
            $this->logger->info("Exiting UserController::edit()");

            return redirect('/');
        }
        else
        {
            $this->logger->info("Exiting UserController::edit()");

            // Get user info
            $user = UserService::getUserById($id);

            // Return view with User data
            return view('users/updateUser')->with('user', $user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $this->logger->info("Entering UserController::update()");

        $this->validateForm($request);

        // Retrieve all user form inputs and clean against SQL injection.
        $userID = $this->clean_input($id);
        $firstname = $this->clean_input($request->input('firstName'));
        $lastname = $this->clean_input($request->input('lastName'));
        $email = $this->clean_input($request->input('email'));
        $role = $this->clean_input($request->input('selector'));
        $suspended = $this->clean_input($request->input('suspended'));
        $password = "";

        // Check if user is admin. If not, keep original information for role and suspended.
        if(session('userRole') != 3)
        {
            $user = UserService::getUserById($id);
            $role = $user->getUserRole();
            $suspended = $user->getSuspended();
        }

        // Create new user and set variables.
        $userModel = new UserModel($firstname, $lastname, $email, $password);
        $userModel->setUserRole($role);
        $userModel->setSuspended($suspended);
        $userModel->setUserID($userID);

        // Reroute based upon success of update
        if(UserService::updateUser($userModel))
        {
            $this->logger->info("UserID edited");
            $this->logger->info("Exiting UserController::update()");

            if(session('userRole') != 3)
            {
                return redirect('userinfo/'.session('userID'));
            }
            else
            {
                return redirect('users');
            }
        }
        else
        {
            $this->logger->info("UserID update failed");
            $this->logger->info("Exiting UserController::update()");

            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->logger->info("Entering UserController::destroy()", array('DeleteUserID'=>$id));

        // Call Delete function and delete user
        if(UserService::deleteUser($id))
        {
            $this->logger->info("User deleted", array('DeleteUserID'=>$id));
        }
        else
        {
            $this->logger->info("User delete failed");
        }

        $this->logger->info('Exiting UserController::destroy()');

        return redirect('/users');
    }

    // Function for returning a single user ID combined with the user's profile data and Job history
    public function userInfo($id)
    {
        $this->logger->info("Entering UserController::userInfo", array("requestedUserID"=>$id));

        // Check if user is admin or trying to access user information other than their own
        if(session('userRole') != 3 && session('userID') != $id)
        {
            $this->logger->info("Exiting UserController::userInfo");
            return redirect('/');
        }
        else
        {
            // Get user data
            $user = UserService::getUserById($id);

            // Get Profile Data
            $profileModel = ProfileService::getProfileByUserID($id);

            // Get Job History data
            $jobHistory = JobHistoryService::getJobHistoryByUserID($id);

            // Get Education History
            $eduHistory = EducationService::getEducationByUserID($id);

            // Get User Skills
            $skills = SkillService::getSkillsByUserId($id);

            $this->logger->info("Exiting UserController::userInfo");

            // Return view with User and Profile data
            return view('users/displayUserInfo')
                ->with('profile', $profileModel)
                ->with('user', $user)
                ->with('jobHistory', $jobHistory)
                ->with('education', $eduHistory)
                ->with('skills', $skills);
        }
    }

    // Function for clearing user inputs against SQL injection
    private function clean_input($inputData): string
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }

    // Function for validating form inputs from user.
    private function validateForm(Request $request)
    {
        // Set rules
        $rules = ['firstName'=>'Required | Alpha',
            'lastName'=>'Required | Alpha',
            'password'=>['regex:/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{7,})\S$/'],
            'password-repeat'=>'same:password'
        ];

        // Validate input
        $this->validate($request, $rules);
    }
}
