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
use App\Services\Utility\ILogger;
use Illuminate\Http\Request;

class AffinityGroupsController extends Controller
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
     */
    public function index()
    {
        $this->logger->info("Entering AffinityGroupsController::index()");

        // Get all Affinity Groups from database
        $affinityGroupArray = AffinityGroupService::getAllAffinityGroups();

        // Get array of user ids for each affinity group and set to AffinityGroupModel $user
        if ($affinityGroupArray)
        {
            foreach($affinityGroupArray as $group)
            {
                $group->setUsers(AffinityGroupService::getAffinityGroupUsers($group->getAffinityGroupID()));
            }
        }

        $this->logger->info("Exiting AffinityGroupsController::index()");

        // Return view with Affinity Groups
        return view('affinityGroups/displayAffinityGroup')->with('affinityGroupArray', $affinityGroupArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $this->logger->info("Entering AffinityGroupsController::create()");
        $this->logger->info("Exiting AffinityGroupsController::create()");

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
        $this->logger->info("Entering AffinityGroupsController::store()");

        // Retrieve variables from form input
        $title = $this->clean_input($request->input('affinityGroupTitle'));
        $desc =  $this->clean_input($request->input('affinityGroupDesc'));

        // Create new Affinity Group
        $newGroup = new AffinityGroupModel(null, $title, $desc, 0);

        // Add new Affinity Group to database.
        if ($groupID = AffinityGroupService::addAffinityGroup($newGroup))
        {
            $this->logger->info("Affinity Group Successfully Added", array("AffinityGroup"=>$title));
            $this->logger->info("Exiting AffinityGroupsController::store()");

            return redirect('affinitygroup');
        }
        else
        {
            $this->logger->info("Creation of Affinity Group failed");
            $this->logger->info("Exiting AffinityGroupsController::store()");

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
        $this->logger->info("Entering AffinityGroupsController::show()");

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

        $this->logger->info("Exiting AffinityGroupsController::show()");

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
        $this->logger->info("Entering AffinityGroupsController::edit()", array('AffinityGroupID' => $id));

        // Get Affinity Group by its id
        $group = AffinityGroupService::getAffinityGroupByID($id);

        $this->logger->info("Exiting AffinityGroupsController::edit()");

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
        $this->logger->info("Entering AffinityGroupsController::update()", array('AffinityGroupID' => $id));

        // Get form input data
        $groupName = $this->clean_input($request->input('affinityGroupTitle'));
        $groupDesc = $this->clean_input($request->input('affinityGroupDesc'));

        // Create new AffinityGroupModel
        $affinityGroup = new AffinityGroupModel($id, $groupName, $groupDesc, 0);

        // Update Affinity Group in database
        if(AffinityGroupDAO::updateAffinityGroup($affinityGroup))
        {
            $this->logger->info("Update Affinity Group successful", array('AffinityGroupID' => $id));
            $this->logger->info("Exiting AffinityGroupsController::update()");

            return redirect('affinitygroup');
        }
        else
        {
            $this->logger->info("Update Affinity Group unsuccessful", array('AffinityGroupID' => $id));
            $this->logger->info("Exiting AffinityGroupsController::update()");

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
        $this->logger->info("Entering AffinityGroupsController::destroy()", array('AffinityGroupID' => $id));

        // Delete Affinity Group from database
        if(AffinityGroupService::deleteAffinityGroupById($id))
        {
            $this->logger->info("Delete Affinity Group successful", array('AffinityGroupID' => $id));
        }
        else
        {
            $this->logger->info("Delete Affinity Group unsuccessful", array('AffinityGroupID' => $id));
        }

        $this->logger->info("Exiting AffinityGroupController::destroy()");

        // Send user back to Affinity Group listing
        return redirect('affinitygroup');
    }

    // Method for adding new user to Affinity Group. Takes requested affinity group id and uses session user id
    public function addUserToGroup($affinity_id)
    {
        $this->logger->info("Entering AffinityGroupsController::addUserToGroup()", array('AffinityGroupID' => $affinity_id));

        // Add member to Affinity group
        AffinityGroupService::addUserToAffinityGroup($affinity_id, session('userID'));

        $this->logger->info("Exiting AffinityGroupsController::addUserToGroup()");

        return redirect('affinitygroup');
    }

    // Method for removing a user from a Affinity Group. Takes requested affinity group and uses session user id
    public function removeUserFromGroup($group_id)
    {
        $this->logger->info("Entering AffinityGroupsController::removeUserFromGroup()", array('AffinityGroupID' => $group_id));

        // Remove member from affinity group
        AffinityGroupService::removeUserFromGroup($group_id, session('userID'));

        $this->logger->info("Exiting AffinityGroupsController::removeUserFromGroup()");

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
