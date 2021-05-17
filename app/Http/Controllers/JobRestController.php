<?php

namespace App\Http\Controllers;

use App\Models\DTOModel;
use App\Services\Business\JobService;

class JobRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $jobsArray = JobService::getAllJobs();

        if($jobsArray)
        {
            $jobDTO = new DTOModel(0,'No Errors', $jobsArray);
        }
        else
        {
            $jobDTO = new DTOModel(1,'No Data Found', $jobsArray);
        }

        return json_encode($jobDTO);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $job = JobService::getJobByID($id);

        if($job)
        {
            $jobDTO = new DTOModel(0,'No Errors', $job);
        }
        else
        {
            $jobDTO = new DTOModel(2,'Job Index Not Found', $job);
        }

        return json_encode($jobDTO);
    }

}
