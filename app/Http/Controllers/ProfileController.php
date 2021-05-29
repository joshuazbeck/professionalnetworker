<?php
/*
 * Group 1 Milestone 2
 * ProfileController.php Version 1
 * CST-256
 * 4/24/2021
 * This is a Controller for handling all actions related to the Profile class
 */

namespace App\Http\Controllers;

use App\Services\Business\ProfileService;
use App\Services\Business\UserService;
use App\Services\Utility\ILogger;
use Illuminate\Http\Request;
use App\Models\ProfileModel;

class ProfileController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $this->logger->info("Entering ProfileController::create()");
        $this->logger->info("Exiting ProfileController::create()");

        return view('profiles/setupprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->logger->info("Entering ProfileController::store()");

        // Retrieve variables from form input
        $user_id = session('userID');
        $occupation = $this->clean_input($request->input('occupation'));
        $gender = $this->clean_input($request->input('selector'));
        $age = $this->clean_input($request->input('age'));
        $phone = $this->clean_input($request->input('phoneNum'));
        $bio = $this->clean_input($request->input('bio'));
        $city = $this->clean_input($request->input('city'));
        $state = $this->clean_input($request->input('state'));

        // Create new profile class
        $newProfile = new ProfileModel($user_id, $phone, $occupation, $age, $gender, $city, $state, $bio);

        // Add new Profile to database. If good update User class for profile complete
        if (ProfileService::addProfile($newProfile))
        {
            $this->logger->info("Exiting ProfileController::store()");

            UserService::updateProfileComplete($user_id, true);
            return redirect('/');
        }
        else{
            $this->logger->info("Exiting ProfileController::store()");

            return view('profiles/setupprofile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $this->logger->info("Entering ProfileController::show()", array('ProfileID'=>$id));

        // If user is not admin or the profile being accessed is not their own, reroute to mainpage
        if(session('userRole') != 3 && session('userID') != $id)
        {
            $this->logger->info("Exiting ProfileController::show()");

            return redirect('/');
        }
        // Get User Profile and return displayProfile view
        else
        {
            // Get User data
            $user = UserService::getUserById($id);

            // Get User's Profile data
            $profileModel = ProfileService::getProfileByUserID($id);

            $this->logger->info("Exiting ProfileController::show()");

            // Return view ith user and profile data
            return view('profiles/displayProfile')->with('profile', $profileModel)->with('user', $user);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->logger->info("Entering ProfileController::edit()", array('ProfileID'=>$id));

        // Get User data
        $user = UserService::getUserById($id);

        // Get user Profile Data
        $profile = ProfileService::getProfileByUserID($id);

        $this->logger->info("Exiting ProfileController::edit()");

        // Return view with User and Profile data
        return view('profiles/updateProfile')->with('user', $user)->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $this->logger->info("Entering ProfileController::update()", array('ProfileID'=>$id));

        // Get form input data
        $user_id = $id;
        $profileID = $this->clean_input($request->input('profileID'));
        $occupation = $this->clean_input($request->input('occupation'));
        $gender = $this->clean_input($request->input('gender'));
        $age = $this->clean_input($request->input('age'));
        $phone = $this->clean_input($request->input('phone'));
        $bio = $this->clean_input($request->input('bio'));
        $city = $this->clean_input($request->input('city'));
        $state = $this->clean_input($request->input('state'));

        // Create new Profile class with data
        $newProfile = new ProfileModel($user_id, $phone, $occupation, $age, $gender, $city, $state, $bio);
        $newProfile->setProfileID($profileID);

        // Reroute based upon Profile update success
        if(ProfileService::updateProfile($newProfile))
        {
            // If user is Admin, reroute to admin page. If not reroute to profile page
            if(session('userRole') != 3)
            {
                $this->logger->info("Profile update successful", array('ProfileID'=>$id));
                $this->logger->info("Exiting ProfileController::update()");

                return redirect('userinfo/'.session('userID'));
            }
            else
            {
                $this->logger->info("Profile update successful", array('ProfileID'=>$id));
                $this->logger->info("Exiting ProfileController::update()");

                return redirect('profiles/'.$id);
            }
        }
        else
        {
            $this->logger->info("Profile update unsuccessful", array('ProfileID'=>$id));
            $this->logger->info("Exiting ProfileController::update()");

            return redirect('/');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        //
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
