<?php
/*
 * Group 1 Milestone 4
 * JobHistoryService.php Version 1
 * CST-256
 * 5/4/2021
 * This class is a service designed to handle interactions with the database concerning users job history.
 */
namespace App\Services\Business;


use App\Models\JobHistoryModel;
use App\Services\Data\JobHistoryDAO;

class JobHistoryService
{
    // Method to add a new job to users profile. Takes JobHistoryModel and user ID as argument.
    public static function addJobHistory(JobHistoryModel $newJob): bool
    {
        return JobHistoryDAO::addJobHistory($newJob);
    }

    // Method for getting a users complete job history. Takes user id as argument and returns array of JobHistoryModel
    public static function getJobHistoryByUserID($id): ?array
    {
        return JobHistoryDAO::getJobHistoryByUserID($id);
    }

    // Method for deleting a job from users history. Takes job id as argument and returns boolean.
    public static function deleteJobHistoryByJobID($id): bool
    {
        return JobHistoryDAO::deleteJobHistoryByJobId($id);
    }

    // Method for getting job history by its ID. Takes ID as argument and returns JobHistoryModel.
    public static function getJobHistoryByJobID($id): ?JobHistoryModel
    {
        return JobHistoryDAO::getJobHistoryByJobID($id);
    }

    // Method for updating a job history instance. Takes JobHistoryModel as argument and returns boolean.
    public static function updateJobHistory(JobHistoryModel $job): bool
    {
        return JobHistoryDAO::updateJobHistory($job);
    }
}
