<?php
/*
 * Group 1 Milestone 6
 * JobRestController.php Version 1
 * CST-256
 * 5/22/2021
 * This is a Job Rest Controller that provides a list of jobs or single job as JSON
 */
namespace App\Http\Controllers;

use App\Models\DTOModel;
use App\Services\Business\JobService;

class JobRestController extends Controller
{
    /**
     * Display a listing of all jobs as JSON
     *
     */
    public function index()
    {
        // Get Array of all jobs
        $jobsArray = JobService::getAllJobs();

        // If array has results
        if($jobsArray)
        {
            // Limit list of returned jobs to 20
            if(sizeof($jobsArray) > 20)
            {
                $jobDTO = new DTOModel(2,'Jobs clipped at 20', array_slice($jobsArray, 0 , 20));
            }
            else
            {
                $jobDTO = new DTOModel(0,'No Errors', $jobsArray);
            }
        }
        else
        {
            // Create DTO with error
            $jobDTO = new DTOModel(1,'No Data Found', $jobsArray);
        }

        // Return data as JSON
        return json_encode($jobDTO);
    }

    /**
     * Display the specified JOB.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        // Get job by its id
        $job = JobService::getJobByID($id);

        // If job returned
        if($job)
        {
            // Create DTO with Job data
            $jobDTO = new DTOModel(0,'No Errors', $job);
        }
        else
        {
            // Create DTO with error
            $jobDTO = new DTOModel(2,'Job Index Not Found', $job);
        }

        // Return data as JSON
        return json_encode($jobDTO);
    }

}
