<?php
/*
 * Group 1 Milestone 4
 * AffinityGroupController.php Version 1
 * CST-256
 * 5/6/2021
 * This is a Affinity Group Controller that handles all requests concerning affinity groups
 */
namespace App\Http\Controllers;

use App\Models\AffinityGroupModel;
use App\Services\Business\AffinityGroupService;
use App\Services\Business\UserService;
use App\Services\Data\AffinityGroupDAO;
use Illuminate\Http\Request;

class AffinityGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // Get all Affinity Groups from database
        $affinityGroupArray = AffinityGroupService::getAllAffinityGroups();

        // Get array of user ids for each affinity group and set to AffinityGroupModel $user
        foreach($affinityGroupArray as $group)
        {
            $group->setUsers(AffinityGroupService::getAffinityGroupUsers($group->getAffinityGroupID()));
        }

        // Return view with Affinity Groups
        return view('affinityGroups/displayAffinityGroup')->with('affinityGroupArray', $affinityGroupArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        // Return form for creating a new affinity group
        return view('affinityGroups/createaffinitygroup');
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
        $desc =  $this->clean_input($request->input('affinityGroupDesc'));

        // Create new Affinity Group
        $newGroup = new AffinityGroupModel(null, $title, $desc, 0);

        // Add new Affinity Group to database.
        if ($groupID = AffinityGroupService::addAffinityGroup($newGroup))
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
     */
    public function show($id)
    {
        // Get Affinity Group
        $affinity_group = AffinityGroupService::getAffinityGroupByID($id);

        // Get all user ids for requested Affinity Group
        $member_array = AffinityGroupService::getAffinityGroupUsers($id);

        // Array to hold user information
        $user_array = array();

        // Get UserModel for each member of requested affinity group
        foreach($member_array as $member_id)
        {
            array_push($user_array, UserService::getUserById($member_id));
        }

        // Return view with Affinity group and array of members information
        return view('affinityGroups/displayIndividualAffinityGroup')->with('affinity', $affinity_group)->with('user_array', $user_array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        // Get Affinity Group by its id
        $group = AffinityGroupService::getAffinityGroupByID($id);

        // Return form with Affinity Group information
        return view('affinityGroups/updateaffinitygroup')->with('affinitygroup', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // Get form input data
        $groupName = $this->clean_input($request->input('affinityGroupTitle'));
        $groupDesc = $this->clean_input($request->input('affinityGroupDesc'));

        // Create new AffinityGroupModel
        $affinityGroup = new AffinityGroupModel($id, $groupName, $groupDesc, 0);

        // Update Affinity Group in database
        if(AffinityGroupDAO::updateAffinityGroup($affinityGroup))
        {
            return redirect('affinitygroup');
        }
        else
        {
            return redirect(route('affinitygroup.edit', $id ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        // Delete Affinity Group from database
        AffinityGroupService::deleteAffinityGroupById($id);

        // Send user back to Affinity Group listing
        return redirect('affinitygroup');
    }

    // Method for adding new user to Affinity Group. Takes requested affinity group id and uses session user id
    public function addUserToGroup($affinity_id)
    {
        // Add member to Affinity group
        AffinityGroupService::addUserToAffinityGroup($affinity_id, session('userID'));

        return redirect('affinitygroup');
    }

    // Method for removing a user from a Affinity Group. Takes requested affinity group and uses session user id
    public function removeUserFromGroup($group_id)
    {
        // Remove member from affinity group
        AffinityGroupService::removeUserFromGroup($group_id, session('userID'));

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
