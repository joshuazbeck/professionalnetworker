<?php
/*
 * Group 1 Milestone 3
 * JobController.php Version 1
 * CST-256
 * 4/30/2021
 * This is a Job Controller that provides all requests for jobs..
 */
namespace App\Http\Controllers;

use App\Models\JobApplicationModel;
use App\Models\JobModel;
use App\Services\Business\JobService;
use App\Services\Business\SkillService;
use App\Services\Business\UserService;
use App\Services\Data\JobDAO;
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

        foreach($jobsArray as $job)
        {
            $job->setAppArray(JobService::getJobApplicationsByJobID($job->getJobID()));
        }

        // Return view with Jobs and Skills array
        return view('jobs/displayJobs')->with('jobsArray', $jobsArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // Get all skills
        $skills = SkillService::getAllSkills();

        // Return form for creating a job with list of Skills
        return view('jobs/createjob')->with('skills', $skills);
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

        // Get array of "checked" skills from form
        $skillarray = $request->input('skillarray');

        // Create new job
        $newJob = new JobModel(null, $title, $desiredSkill, $company, $pay, $status, $description, $city, $state);

        // Add new Job to database.
        if ($jobID = JobService::addJob($newJob))
        {
            // Step through selected skills and add those not already in user's skills
            foreach($skillarray as $skill)
            {
                SkillService::addJobSkill($skill, $jobID);
            }

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
        return view('jobs/updateJob')->with('job', $job);
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

    // Method for returning a view that starts a job search
    public function searchJobs()
    {
        return view('jobs/searchJobs');
    }

    // Method that handles a job search request.
    public function doJobSearch(Request $request)
    {
        // Array to hold job search results
        $job_Array = array();

        //Check if user was searching by skills or keyword
        if ($request->input('route') == 'skills')
        {
            // Search jobs against user's skills
            $job_Array = JobService::matchUserJobSkill(session('userID'));
        }
        else
        {
            // Verify searchString and searchColumn are not empty.
            if ($request->input('searchString') &&  $request->input('searchColumn'))
            {
                // Get search values
                $searchString = $this->clean_input($request->input('searchString'));
                $searchColumn = $this->clean_input($request->input('searchColumn'));

                // Get array from search values
                $job_Array = JobService::searchJobsByKeyword($searchString, $searchColumn);
            }
        }

        // Return results
        return view('jobs/jobSearchResults')->with('jobsArray', $job_Array);
    }

    // Method for returning form to apply for job
    public function applyForJob($id)
    {
        // Get current user's data
        $user = UserService::getUserById(session('userID'));
        // Get job data
        $job = JobService::getJobByID($id);

        // Return view
        return view('jobs/jobApplication')->with('user', $user)->with('job', $job);
    }

    // Method for processing job application form.
    public function processApplication(Request $request)
    {
        // Get job ID
        $jobID = $this->clean_input($request->input('JobID'));

        // Create filename for uploaded file
        $resumeFile = time().'.'.$request->file('fileToUpload')->getClientOriginalExtension();
        
        $rules = [
            'fileToUpload' => 'required|max:1000|mimes:pdf'
            // add validations for other fields here
        ];

        $this->validate($request, $rules);
        // Move file to public/resumes directory
        $request->file('fileToUpload')->move(public_path('/resumes'), $resumeFile);

        // Get current user's information
        $user = UserService::getUserById(session('userID'));

        // Create new JobApplicationModel
        $jobApp = new JobApplicationModel(0, $jobID, $user->getUserID(), $user->getFirstName(), $user->getLastName(), $resumeFile);

        // Add application to the database
        JobDAO::addJobApplication($jobApp);

        // Return to job search view
        return view('jobs/searchJobs');
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
