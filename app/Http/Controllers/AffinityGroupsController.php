<?php
/*
 * Group 1 Milestone 3
 * JobController.php Version 1
 * CST-256
 * 4/30/2021
 * This is a Job Controller that provides all requests for jobs..
 */
namespace App\Http\Controllers;

use App\Models\AffinityGroupModel;
use App\Services\Business\AffinityGroupService;
use App\Services\Business\JobService;
use Illuminate\Http\Request;

class AffinityGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    
    
    public function index()
    {

        //@todo: Route to editAffinityGroups and pass array of all affinity groups to $affinityGroupArray and userID to $user
        
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // Return form for creating a job with list of Skills
        return view('createaffinitygroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

        // Retrieve variables from form input
        $title = $this->clean_input($request->input('affinityGroupTitle'));
        
        // Create new job
        $newGroup = new AffinityGroupModel(null, $title, 0);

        // Add new Job to database.
        if ($groupID = AffinityGroupService::addAffinityModel($newGroup))
        {
            return redirect('affinitygroup');
        }
        else
        {
            return view('affinitygroup.create');
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
        //@todo: route to displayIndividualAffinityGroup with passed affinitygroup model
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        // Get Job by its id
        $group = AffinityGroupService::getAffinityGroupByID($id);

        // Return form with Job information
        
        //Correct, updated routing
        return view('updateaffinitygroup')->with('affinitygroup-', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
//         // Retrieve variables from form input
//         $title = $this->clean_input($request->input('jobTitle'));
//         $company = $this->clean_input($request->input('company'));
//         $pay = $this->clean_input($request->input('payHourly'));
//         $status = $this->clean_input($request->input('selector'));
//         $description = $this->clean_input($request->input('jobDescription'));
//         $city = $this->clean_input($request->input('city'));
//         $state = $this->clean_input($request->input('state'));
//         $desiredSkill = $this->clean_input($request->input('desiredSkill'));

//         // Create new Job class
//         $newJob = new JobModel($id, $title, $desiredSkill, $company, $pay, $status, $description, $city, $state);

//         // Reroute based upon job update success
//         if(JobService::updateJob($newJob))
//         {
//             return redirect('affinitygroup');
//         }
//         else
//         {
//             return redirect('/');
//         }
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
        return redirect('affinitygroup');
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
