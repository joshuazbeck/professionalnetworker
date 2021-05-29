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
use App\Services\Utility\ILogger;
use Illuminate\Http\Request;

class EducationController extends Controller
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
        $this->logger->info("Entering EducationController::create()");
        $this->logger->info("Exiting EducationController::create()");

        return view('education/createEducation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->logger->info("Entering EducationController::store()");

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
            $this->logger->info("Exiting EducationController::store()");

            return redirect('userinfo/'.session('userID'));
        }
        else{
            $this->logger->info("Exiting EducationController::store()");

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
        $this->logger->info("Entering EducationController::show()", array('education ID'=>$id));

        // Get user information
        $user = UserService::getUserById($id);

        // Get user education
        $education = EducationService::getEducationByUserID($id);

        $this->logger->info("Exiting EducationController::show()");

        return view('education/displayEducation')->with('user', $user)->with('education', $education);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $this->logger->info("Entering EducationController::edit()", array('education ID'=>$id));

        // Get specific education instance for user
        $education = EducationService::getEducationByEduID($id);

        $this->logger->info("Exiting EducationController::edit()");

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
        $this->logger->info("Entering EducationController::update()", array('education ID'=>$id));

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
            $this->logger->info("Education update successful", array('education ID'=>$id));
            $this->logger->info("Exiting EducationController::update()");

            return redirect('userinfo/'.session('userID'));
        }
        else
        {
            $this->logger->info("Education update unsuccessful", array('education ID'=>$id));
            $this->logger->info("Exiting EducationController::update()");

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
        $this->logger->info("Entering EducationController::destroy()", array('education ID'=>$id));

        // Delete instance of education by id
        if(EducationService::deleteEducationByID($id))
        {
            $this->logger->info("Education delete successful", array('education ID'=>$id));
        }
        else
        {
            $this->logger->info("Education delete unsuccessful", array('education ID'=>$id));
        }

        // Get user ID from session
        $userID = session('userID');

        // Get user information
        $user = UserService::getUserById($userID);

        // Get user's education history
        $education = EducationService::getEducationByUserID($userID);

        $this->logger->info("Exiting EducationController::destroy()");

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
