<?php
/*
 * Group 1 Milestone 3
 * JobModel.php Version 1
 * CST-256
 * 4/30/2021
 * This Model represents a Job for the site.
 */

namespace App\Models;


class AffinityGroupModel
{

    private $affinityGroupID;

    private $affinityGroupName;
    
    private $users;

    private $affinityGroupSuspended;

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function getAffinityGroupID()
    {
        return $this->affinityGroupID;
    }

    /**
     * @return mixed
     */
    public function getAffinityGroupName()
    {
        return $this->affinityGroupName;
    }

    /**
     * @return mixed
     */
    public function getAffinityGroupSuspended()
    {
        return $this->affinityGroupSuspended;
    }

    /**
     * @param mixed $affinityGroupID
     */
    public function setAffinityGroupID($affinityGroupID)
    {
        $this->affinityGroupID = $affinityGroupID;
    }

    /**
     * @param mixed $affinityGroupName
     */
    public function setAffinityGroupName($affinityGroupName)
    {
        $this->affinityGroupName = $affinityGroupName;
    }

    /**
     * @param mixed $affinityGroupSuspended
     */
    public function setAffinityGroupSuspended($affinityGroupSuspended)
    {
        $this->affinityGroupSuspended = $affinityGroupSuspended;
    }

    /**
     * JobModel constructor.
     * @param $affinityGroupID
     * @param $affinityGroupName
     * @param $affinityGroupSuspended
     */
    public function __construct($affinityGroupID, $affinityGroupName, $affinityGroupSuspended, $users=null)
    {
        $this->affinityGroupID = $affinityGroupID;
        $this->affinityGroupName = $affinityGroupName;
        $this->affinityGroupSuspended = $affinityGroupSuspended;
        $this->users = $users;
    }

   
}
