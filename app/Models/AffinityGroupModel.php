<?php
/*
 * Group 1 Milestone 4
 * AffinityGroupModel.php Version 1
 * CST-256
 * 5/6/2021
 * This Model represents a Affinity Group for the site.
 */

namespace App\Models;

class AffinityGroupModel
{

    private $affinityGroupID;

    private $affinityGroupName;

    private $affinityGroupDesc;

    private $users = array(); // Array of user ids as int

    private $affinityGroupSuspended;

    /**
     * JobModel constructor.
     * @param $affinityGroupID
     * @param $affinityGroupName
     * @param $affinityGroupDesc
     * @param $affinityGroupSuspended
     */
    public function __construct($affinityGroupID, $affinityGroupName, $affinityGroupDesc, $affinityGroupSuspended, $users=null)
    {
        $this->affinityGroupID = $affinityGroupID;
        $this->affinityGroupName = $affinityGroupName;
        $this->affinityGroupDesc = $affinityGroupDesc;
        $this->affinityGroupSuspended = $affinityGroupSuspended;
        $this->users = $users;
    }

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
     * @return mixed
     */
    public function getAffinityGroupDesc()
    {
        return $this->affinityGroupDesc;
    }

    /**
     * @param mixed $affinityGroupDesc
     */
    public function setAffinityGroupDesc($affinityGroupDesc): void
    {
        $this->affinityGroupDesc = $affinityGroupDesc;
    }

}
