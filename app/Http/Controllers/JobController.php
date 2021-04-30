<?php
/*
 * Group 1 Milestone 2
 * UserController.php Version 1
 * CST-256
 * 4/23/2021
 * This is a User Controller class for handling all User functions.
 */
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\ProfileService;
use App\Services\Business\UserService;
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
       $availableJobs = JobService::getAllJobs();
       return view('displayJobs')->with('availableJobs', $availableJobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('createjob');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //@todo implement
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
        // Check if user is admin or trying to update a user other than themselves. Reroute to main page
        if(session('userRole') != 3 && session('userID') != $id)
        {
            return redirect('/');
        }
        else
        {
            // Get user info
            $job = JobService::getJobById($id);

            // Return view with User data
            return view('updateJob')->with('job', $job);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
      
        //@todo implement
        return redirect('jobs');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        // Call Delete function and delete user
       JobService::deleteJob($id);

       return redirect('/jobs');
    }

    
    // Function for clearing user inputs against SQL injection
    function clean_input($inputData): string
    {
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);
        return $inputData;
    }

    // Function for validating form inputs from user.
    private function validateForm(Request $request)
    {
        // Set rules
        $rules = ['firstName'=>'Required | Alpha',
            'lastName'=>'Required | Alpha',
            'email'=>'unique:users,EMAIL|email:rfc,dns|Required',
            'password'=>['regex:/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{7,})\S$/'],
            'password-repeat'=>'same:password'
        ];

        // Validate input
        $this->validate($request, $rules);
    }
}
