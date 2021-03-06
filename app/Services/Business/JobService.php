<?php
/*
 * Group 1 Milestone 3
 * JobService.php Version 1
 * CST-256
 * 4/30/2021
 * This class is a service designed to handle interactions with the database concerning Jobs.
 */
namespace App\Services\Business;


use App\Models\JobApplicationModel;
use App\Models\JobModel;
use App\Services\Data\JobDAO;

class JobService
{
    // Static function for getting all Jobs from database. Returns array or Null
    public static function getAllJobs(): ?array
    {
        return JobDAO::getAllJobs();
    }

    // Static function for adding a job to the database. Takes JobModel as argument and returns insert id or boolean
    public static function addJob(JobModel $job)
    {
        return JobDAO::addJob($job);
    }

    // Static function for deleting a job by its ID. Takes id as argument and returns boolean
    public static function deleteJobById($id): bool
    {
        return JobDAO::deleteJobById($id);
    }

    // Static function for getting a job by its id. Takes id number and returns JobModel
    public static function getJobByID($id): ?JobModel
    {
        return JobDAO::getJobById($id);
    }

    // Static function for updating a job by its ID. Takes JobModel as argument and returns boolean.
    public static function updateJob(JobModel $job): bool
    {
        return JobDAO::updateJobById($job);
    }

    // Static function for getting an array of jobs matching user's skills. Takes user ID as argument returns array of JobModel
    public static function matchUserJobSkill($id): ?array
    {
        return JobDAO::matchUserJobSkill($id);
    }

    // Static function for getting an array of jobs filtered by a search string and column name. Returns JobModel array
    public static function searchJobsByKeyword($searchString, $searchColumn): ?array
    {
        return JobDAO::searchJobsByKeyword($searchString, $searchColumn);
    }

    // Static function for adding a new job application to the database.
    public static function addJobApplication(JobApplicationModel $jobApp)
    {
        return JobDAO::addJobApplication($jobApp);
    }

    // Static function for retrieving a job application from the database.
    public static function getJobApplicationsByJobID($id): ?array
    {
        return JobDAO::getApplicationsByJobID($id);
    }
}
