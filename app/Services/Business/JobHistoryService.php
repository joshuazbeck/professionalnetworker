<?php


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

    public static function deleteJobHistoryByJobID($id): bool
    {
        return JobHistoryDAO::deleteJobHistoryByJobId($id);
    }

    public static function getJobHistoryByJobID($id): ?JobHistoryModel
    {
        return JobHistoryDAO::getJobHistoryByJobID($id);
    }

    public static function updateJobHistory(JobHistoryModel $job): bool
    {
        return JobHistoryDAO::updateJobHistory($job);
    }
}
