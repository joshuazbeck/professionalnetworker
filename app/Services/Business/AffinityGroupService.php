<?php
/*
 * Group 1 Milestone 4
 * AffinityGroupService.php Version 1
 * CST-256
 * 5/6/2021
 * This class is a service designed to handle interactions with the database concerning Affinity Groups.
 */
namespace App\Services\Business;

use App\Models\AffinityGroupModel;
use App\Services\Data\AffinityGroupDAO;

class AffinityGroupService
{
    // Method for returning an array of user ids for members of affinity group.
    public static function getAffinityGroupUsers($affinityGroupID): ?array
    {
        return AffinityGroupDAO::getAffinityGroupUserIDs($affinityGroupID);
    }

    // Static function for getting all Affinity Groups from database. Returns array or Null
    public static function getAllAffinityGroups(): ?array
    {
        return AffinityGroupDAO::getAllAffinityGroups();
    }

    // Static function for adding a Affinity Group to the database. Takes AffinityGroupModel as argument and returns insert id or boolean
    public static function addAffinityGroup(AffinityGroupModel $affinityGroup)
    {
        return AffinityGroupDAO::addAffinityGroup($affinityGroup);
    }

    // Static function for getting an Affinity Group by its id. Takes id number and returns AffinityGroupModel
    public static function getAffinityGroupByID($id): ?AffinityGroupModel
    {
        return AffinityGroupDAO::getAffinityGroupByID($id);
    }

    // Static function for adding a user to an affinity group. Takes affinity group id and user id. Returns bool
    public static function addUserToAffinityGroup($affinity_id, $user_id)
    {
        return AffinityGroupDAO::addUserToAffinityGroup($affinity_id, $user_id);
    }

    // Static function for removing a user from a affinity group. Takes affinity group id and user id. Returns bool.
    public static function removeUserFromGroup($group_id, $user_id): bool
    {
        return AffinityGroupDAO::removeUserFromAffinityGroup($group_id, $user_id);
    }

    // Static function for updating an Affinity Group. Takes AffinityGroupModel as arugment and returns bool.
    public static function updateAffinityGroup(AffinityGroupModel $affinityGroup): bool
    {
        return AffinityGroupDAO::updateAffinityGroup($affinityGroup);
    }

    // Static function for deleting a Affinity Group. Takes affinity group id as argument. Returns bool.
    public static function deleteAffinityGroupById($id): bool
    {
        return AffinityGroupDAO::deleteAffinityGroupById($id);
    }
}
