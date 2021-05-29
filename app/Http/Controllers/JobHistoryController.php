<?php
/*
 * Group 1 Milestone 3
 * JobHistoryController.php Version 1
 * CST-256
 * 4/30/2021
 * This is a Job History Controller that provides all requests for job histories..
 */
namespace App\Http\Controllers;

use App\Services\Business\JobHistoryService;
use App\Services\Business\UserService;
use App\Services\Utility\ILogger;
use Illuminate\Http\Request;
use App\Models\JobHistoryModel;

class JobHistoryController extends Controller
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
     */
    public function create()
    {
        $this->logger->info("Entering JobHistoryController::create()");
        $this->logger->info("Exiting JobHistoryController::create()");

        // Return view with User and Profile data
        return view('jobHistory/createJobHistory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->logger->info("Entering JobHistoryController::store()");

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
            $this->logger->info("Exiting JobHistoryController::store()");

            return redirect('userinfo/'.session('userID'));
        }
        else{
            $this->logger->info("Exiting JobHistoryController::store()");

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
        $this->logger->info("Entering JobHistoryController::show()", array('JobHistoryID'=>$id));

        // Get user information
        $user = UserService::getUserById($id);

        // Get user's job history
        $jobHistory = JobHistoryService::getJobHistoryByUserID($id);

        $this->logger->info("Exiting JobHistoryController::show()");

        // Return view with user data and user job history
        return view('jobHistory/displayJobHistory')->with('user', $user)->with('jobHistory', $jobHistory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->logger->info("Entering JobHistoryController::edit()", array('JobHistoryID'=>$id));

        // Get user Job Data
        $job = JobHistoryService::getJobHistoryByJobID($id);

        $this->logger->info("Exiting JobHistoryController::edit()");

        // Return view with job history
        return view('jobHistory/editJobHistory')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $this->logger->info("Entering JobHistoryController::update()", array('JobHistoryID'=>$id));

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
            $this->logger->info("Job History Update successful", array('JobHistoryID'=>$id));
            $this->logger->info("Exiting JobHistoryController::update()");

            return redirect('jobHistory/'.session('userID'));
        }
        else
        {
            $this->logger->info("Job History Update unsuccessful", array('JobHistoryID'=>$id));
            $this->logger->info("Exiting JobHistoryController::update()");

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
        $this->logger->info("Entering JobHistoryController::destroy()", array('JobHistoryID'=>$id));

        // Delete job history by id
        if(JobHistoryService::deleteJobHistoryByJobID($id))
        {
            $this->logger->info("Job History Delete successful", array('JobHistoryID'=>$id));
        }
        else
        {
            $this->logger->info("Job History Delete unsuccessful", array('JobHistoryID'=>$id));
        }

        // Get user id
        $userID = session('userID');

        // Get user information
        $user = UserService::getUserById($userID);

        // Get user job history
        $jobHistory = JobHistoryService::getJobHistoryByUserID($userID);

        $this->logger->info("Exiting JobHistoryController::destroy()");

        return view('jobHistory/displayJobHistory')->with('user', $user)->with('jobHistory', $jobHistory);
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


