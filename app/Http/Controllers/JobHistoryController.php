<?php
/*
 * Group 1 Milestone 3
 * JobHistoryController.php Version 1
 * CST-256
 * 4/30/2021
 * This is a Job History Controller that provides all requests for job historys..
 */
namespace App\Http\Controllers;

use App\Services\Business\JobHistoryService;
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
     */
    public function create()
    {
        // Return view with User and Profile data
        return view('createJobHistory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // Get form inputs
        $user_id = $this->clean_input($request->input('userID'));
        $company = $this->clean_input($request->input('job-company'));
        $title = $this->clean_input($request->input('job-title'));
        $desc = $this->clean_input($request->input('job-desc'));
        $startDate = $this->clean_input($request->input('date-start'));
        $stopDate = $this->clean_input($request->input('date-stop'));

        // Create new Job History
        $newJobHistory = new JobHistoryModel($user_id, $company, $title, $desc, $startDate, $stopDate);

        // If success, return to user's info, if not return to profile
        if (JobHistoryService::addJobHistory($newJobHistory))
        {
            return redirect('userinfo/'.session('userID'));
        }
        else{
            return redirect('profiles/'.$user_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        // Get user information
        $user = UserService::getUserById($id);

        // Get user's job history
        $jobHistory = JobHistoryService::getJobHistoryByUserID($id);

        return view('displayJobHistory')->with('user', $user)->with('jobHistory', $jobHistory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        // Get user Job Data
        $job = JobHistoryService::getJobHistoryByJobID($id);

        // Return view with job history
        return view('editJobHistory')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // Get form inputs
        $user_id = $this->clean_input($request->input('userID'));
        $company = $this->clean_input($request->input('job-company'));
        $title = $this->clean_input($request->input('job-title'));
        $desc = $this->clean_input($request->input('job-desc'));
        $startDate = $this->clean_input($request->input('date-start'));
        $stopDate = $this->clean_input($request->input('date-stop'));

        // Create new Job History
        $jobHistory = new JobHistoryModel($user_id, $company, $title, $desc, $startDate, $stopDate);
        $jobHistory->setJobID($id);

        // If success, return to user's info, if not return to profile
        if (JobHistoryService::updateJobHistory($jobHistory))
        {
            return redirect('jobHistory/'.session('userID'));
        }
        else
        {
            return redirect('profiles/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        // Delete job history by id
        JobHistoryService::deleteJobHistoryByJobID($id);

        // Get user id
        $userID = session('userID');

        // Get user information
        $user = UserService::getUserById($userID);

        // Get user job history
        $jobHistory = JobHistoryService::getJobHistoryByUserID($userID);

        return view('displayJobHistory')->with('user', $user)->with('jobHistory', $jobHistory);
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


