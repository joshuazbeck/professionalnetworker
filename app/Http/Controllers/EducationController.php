<?php
/*
 * Group 1 Milestone 4
 * EducationController.php Version 1
 * CST-256
 * 5/4/2021
 * This is a Education Controller that provides all requests for education.
 */
namespace App\Http\Controllers;

use App\Models\EducationModel;
use App\Services\Business\EducationService;
use App\Services\Business\UserService;
use Illuminate\Http\Request;

class EducationController extends Controller
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
        return view('education/createEducation');
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
        $school = $this->clean_input($request->input('school'));
        $field = $this->clean_input($request->input('field'));
        $degreeType= $this->clean_input($request->input('degreeType'));
        $dateGrad = $this->clean_input($request->input('dateGrad'));

        // Create new education History
        $newEducation = new EducationModel($user_id, $school, $field, $dateGrad, $degreeType);

        // If success, return to user's info, if not return to profile
        if (EducationService::addEducation($newEducation))
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

        // Get user education
        $education = EducationService::getEducationByUserID($id);

        return view('education/displayEducation')->with('user', $user)->with('education', $education);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        // Get specific education instance for user
        $education = EducationService::getEducationByEduID($id);

        return view('education/editEducation')->with('education', $education);
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
        $school = $this->clean_input($request->input('school'));
        $field = $this->clean_input($request->input('field'));
        $degreeType= $this->clean_input($request->input('degreeType'));
        $dateGrad = $this->clean_input($request->input('dateGrad'));

        // Create new Education History
        $newEducation = new EducationModel($user_id, $school, $field, $dateGrad, $degreeType);
        $newEducation->setEduID($id);

        // If success, return to user's info, if not return to profile
        if (EducationService::updateEducation($newEducation))
        {
            return redirect('userinfo/'.session('userID'));
        }
        else{
            return redirect('profiles/'.$user_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        // Delete instance of education by id
        EducationService::deleteEducationByID($id);

        // Get user ID from session
        $userID = session('userID');

        // Get user information
        $user = UserService::getUserById($userID);

        // Get user's education history
        $education = EducationService::getEducationByUserID($userID);

        return view('education/displayEducation')->with('user', $user)->with('education', $education);
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
