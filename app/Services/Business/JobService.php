<?php
/*
 * Group 1 Milestone 2
 * UserService.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a service designed to handle all actions regarding the UserModel.
 */
namespace App\Services\Business;

use App\Models\JobModel;
use App\Services\Data\JobDAO;

class JobService
{

    
    // Function for getting an array of all users in the database. Returns array of users
    public static function getAllJobs(): ?array
    {
        return JobDAO::getAllJobs();
    }
    
    
    // Function for deleting a User from the database. Takes User ID as argument and returns boolean.
    public static function deleteJob($id): bool
    {
        return JobDAO::deleteJobById($id);
    }

    // Function for getting a User by their ID from the database. Takes User ID and returns a UserModel
    public static function getJobById($id): ?JobModel
    {
        return JobDAO::getJobById($id);
    }

}
