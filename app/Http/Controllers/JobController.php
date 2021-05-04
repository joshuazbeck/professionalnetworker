<?php
/*
 * Group 1 Milestone 3
 * JobController.php Version 1
 * CST-256
 * 4/30/2021
 * This is a Job Controller that provides all requests for jobs..
 */
namespace App\Http\Controllers;

use App\Models\JobModel;
use App\Services\Business\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // Get array of available jobs
        $jobsArray = JobService::getAllJobs();

        // Return view with Jobs and Skills array
        return view('displayJobs')->with('jobsArray', $jobsArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // Return form for creating a job with list of Skills
        return view('createjob');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

        // Retrieve variables from form input
        $title = $this->clean_input($request->input('jobTitle'));
        $company = $this->clean_input($request->input('company'));
        $pay = $this->clean_input($request->input('payHourly'));
        $status = $this->clean_input($request->input('status'));
        $description = $this->clean_input($request->input('jobDescription'));
        $city = $this->clean_input($request->input('city'));
        $state = $this->clean_input($request->input('state'));
        $desiredSkill = $this->clean_input($request->input('desiredSkill'));

        // Create new job
        $newJob = new JobModel(null, $title, $desiredSkill, $company, $pay, $status, $description, $city, $state);

        // Add new Job to database.
        if ($jobID = JobService::addJob($newJob))
        {
            return redirect('jobs');
        }
        else
        {
            return view('jobs.create');
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
        // Get Job by its id
        $job = JobService::getJobByID($id);

        // Return form with Job information
        return view('updateJob')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // Retrieve variables from form input
        $title = $this->clean_input($request->input('jobTitle'));
        $company = $this->clean_input($request->input('company'));
        $pay = $this->clean_input($request->input('payHourly'));
        $status = $this->clean_input($request->input('selector'));
        $description = $this->clean_input($request->input('jobDescription'));
        $city = $this->clean_input($request->input('city'));
        $state = $this->clean_input($request->input('state'));
        $desiredSkill = $this->clean_input($request->input('desiredSkill'));

        // Create new Job class
        $newJob = new JobModel($id, $title, $desiredSkill, $company, $pay, $status, $description, $city, $state);

        // Reroute based upon job update success
        if(JobService::updateJob($newJob))
        {
            return redirect('jobs');
        }
        else
        {
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
        // Call Delete function and delete job
        JobService::deleteJobById($id);

        // Send user back to Job listing
        return redirect('jobs');
    }

    // Function for clearing user inputs against SQL injection
    private function clean_input($inputData): string
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }
}
