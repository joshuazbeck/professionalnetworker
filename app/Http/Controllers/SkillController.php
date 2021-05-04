<?php

namespace App\Http\Controllers;

use App\Services\Business\SkillService;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $skills = SkillService::getAllSkills();

        return view('displaySkills')->with('skills', $skills);
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

    public function editUserSkills($id)
    {
        $skills = SkillService::getAllSkills();
        $userSkill = SkillService::getSkillsByUserId($id);

        return view('updateUserSkills')->with('skills', $skills)->with('userSkill', $userSkill);
    }

    public function updateUserSkills(Request $request, $id)
    {
        $skillarray = $request->input('skillarray');
        $userSkill = SkillService::getSkillsByUserId($id);

        if($userSkill)
        {
            foreach($userSkill as $skill)
            {
                if($skillarray == NULL || !in_array($skill->getSkillId(), $skillarray))
                {
                    SkillService::deleteSkillByUserId($skill->getAssociatedId());
                }
            }

            if($skillarray)
            {
                foreach($skillarray as $skill)
                {
                    if (is_bool(array_search($skill, array_column($userSkill, 'skillId'))))
                    {
                        SkillService::addUserSkill($skill, session('userID'));
                    }
                }
            }

        }
        else
        {
            if($skillarray)
            {
                foreach($skillarray as $skill)
                {
                    SkillService::addUserSkill($skill, session('userID'));
                }
            }
        }


        return redirect('userinfo/'.session('userID'));
    }
}
