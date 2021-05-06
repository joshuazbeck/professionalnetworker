<?php
/*
 * Group 1 Milestone 3
 * JobService.php Version 1
 * CST-256
 * 4/30/2021
 * This class is a service designed to handle interactions with the database concerning Jobs.
 */
namespace App\Services\Business;


use App\Models\AffinityGroupModel;
use App\Services\Data\AffinityGroupDAO;

abstract class AffinityGroupService
{
   
    //todo: Need to implement a method to get or save all the users from/for an affinity group to database or local model to be displayed
    public static abstract function getUsersForAffinityGroup();
    
    // Static function for getting all Jobs from database. Returns array or Null
    public static function getAllAffinityGroups(): ?array
    {
        return AffinityGroupDAO::getAllJobs();
    }
    
    // Static function for adding a job to the database. Takes JobModel as argument and returns insert id or boolean
    public static function addAffinityGroup(JobModel $job)
    {
        return AffinityGroupDAO::addJob($job);
    }
    
    // Static function for deleting a job by its ID. Takes id as argument and returns boolean
    public static function deleteAffinityGroupById($id): bool
    {
        return AffinityGroupDAO::deleteAffinityGroupById($id);
    }
    
    // Static function for getting a job by its id. Takes id number and returns JobModel
    public static function getAffinityGroupByID($id): ?JobModel
    {
        return AffinityGroupDAO::getAffinityGroupByID($id);
    }
    
    // Static function for updating a job by its ID. Takes JobModel as argument and returns boolean.
    public static function updateAffinityGroup(AffinityGroupModel $agModel): bool
    {
        return AffinityGroupDAO::updateAffinityGroup($job);
    }
}
