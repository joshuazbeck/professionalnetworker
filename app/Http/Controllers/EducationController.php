<?php

namespace App\Http\Controllers;

use App\Models\EducationModel;
use App\Services\Business\EducationService;
use App\Services\Business\JobHistoryService;
use App\Services\Business\UserService;
use App\Services\Data\ProfileDAO;
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
        return view('createEducation');
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

        // Create new Job History
        $newEducation = new EducationModel($user_id, $school, $field, $dateGrad, $degreeType);
//
//        echo $user_id . " " . $school . " " . $field . " " . $degreeType . " " . $dateGrad;

//        // If success, return to user's info, if not return to profile
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
        $user = UserService::getUserById($id);

        $education = EducationService::getEducationByUserID($id);

        return view('displayEducation')->with('user', $user)->with('education', $education);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $education = EducationService::getEducationByEduID($id);

        return view('editEducation')->with('education', $education);
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

        // Create new Job History
        $newEducation = new EducationModel($user_id, $school, $field, $dateGrad, $degreeType);
        $newEducation->setEduID($id);
//
//        echo $user_id . " " . $school . " " . $field . " " . $degreeType . " " . $dateGrad;

//        // If success, return to user's info, if not return to profile
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
        $userID = session('userID');

        EducationService::deleteEducationByID($id);

        $user = UserService::getUserById($userID);

        $education = EducationService::getEducationByUserID($userID);

        return view('displayEducation')->with('user', $user)->with('education', $education);
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
