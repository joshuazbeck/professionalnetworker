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
use Illuminate\Http\Request;
use App\Models\ProfileModel;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('profiles/setupprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
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
            UserService::updateProfileComplete($user_id, true);
            return redirect('/');
        }
        else{
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
        // If user is not admin or the profile being accessed is not their own, reroute to mainpage
        if(session('userRole') != 3 && session('userID') != $id)
        {
            return redirect('/');
        }
        // Get User Profile and return displayProfile view
        else
        {
            // Get User data
            $user = UserService::getUserById($id);

            // Get User's Profile data
            $profileModel = ProfileService::getProfileByUserID($id);

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
        // Get User data
        $user = UserService::getUserById($id);

        // Get user Profile Data
        $profile = ProfileService::getProfileByUserID($id);

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
                return redirect('userinfo/'.session('userID'));
            }
            else
            {
                return redirect('profiles/'.$id);
            }
        }
        else
        {
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
