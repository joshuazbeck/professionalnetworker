<?php
/*
 * Group 1 Milestone 3
 * JobHistoryController.php Version 1
 * CST-256
 * 4/30/2021
 * This is a Job History Controller that provides all requests for job historys..
 */
namespace App\Http\Controllers;

use App\Services\Business\ProfileService;
use App\Services\Business\UserService;
use Illuminate\Http\Request;
use App\Models\JobHistoryModel;

class JobHistoryController extends Controller
{
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // Get User information, User Profile, Job History and return displayUserInfo view
        else
        {
            // Get User data
            $user = UserService::getUserById($id);

            // Get User's Profile data
            $profileModel = ProfileService::getProfileByUserID($id);

            // Get User's Job History
            $jobHistory = ProfileService::getJobHistoryByID($id);

            // Return view ith user and profile data
            return view('displayUserInfo')->with('profile', $profileModel)->with('user', $user)->with('jobHistory', $jobHistory);
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
        return view('editJobHistory')->with('user', $user)->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // User's id
        $user_id = $id;

        // Get form inputs
        $company = $this->clean_input($request->input('job-company'));
        $title = $this->clean_input($request->input('job-title'));
        $years = $this->clean_input($request->input('job-years'));
        $desc = $this->clean_input($request->input('job-desc'));

        // Create new Job History
        $newJobHistory = new JobHistoryModel($company, $title, $years, $desc);

        // If success, return to user's info, if not return to profile
        if (ProfileService::addJobProfile($newJobHistory, $user_id))
        {
            return redirect('userinfo/'.session('userID'));
        }
        else{
            return redirect('profiles/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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


