<?php
/*
 * Group 1 Milestone 4
 * SkillController.php Version 1
 * CST-256
 * 5/4/2021
 * This is a Skill Controller that provides all requests for skills.
 */
namespace App\Http\Controllers;

use App\Services\Business\SkillService;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // Get all skills
        $skills = SkillService::getAllSkills();

        return view('skills/displaySkills')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Method for displaying a form for editing user's skills
    public function editUserSkills($id)
    {
        // Get all skills in database
        $skills = SkillService::getAllSkills();

        // Get all skills associated with user
        $userSkill = SkillService::getSkillsByUserId($id);

        return view('skills/updateUserSkills')->with('skills', $skills)->with('userSkill', $userSkill);
    }

    // Method for updating user skills in database
    public function updateUserSkills(Request $request, $id)
    {
        // Get array of "checked" skills from form
        $skillarray = $request->input('skillarray');

        // Get array of user's current skills
        $userSkill = SkillService::getSkillsByUserId($id);

        // If user has previously selected skills
        if($userSkill)
        {
            // Step through each of the user's skills
            foreach($userSkill as $skill)
            {
                // If user's current skill was not selected in form
                if($skillarray == NULL || !in_array($skill->getSkillId(), $skillarray))
                {
                    // Remove skill from user
                    SkillService::deleteSkillByUserId($skill->getAssociatedId());
                }
            }

            // Check if user selected any skills
            if($skillarray)
            {
                // Step through selected skills and add those not already in user's skills
                foreach($skillarray as $skill)
                {
                    if (is_bool(array_search($skill, array_column($userSkill, 'skillId'))))
                    {
                        SkillService::addUserSkill($skill, session('userID'));
                    }
                }
            }

        }
        // If user had no previous skills
        else
        {
            // Check if user selected skills
            if($skillarray)
            {
                // Add any skills
                foreach($skillarray as $skill)
                {
                    SkillService::addUserSkill($skill, session('userID'));
                }
            }
        }

        return redirect('userinfo/'.session('userID'));
    }
}
