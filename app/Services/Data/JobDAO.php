<?php
/*
 * Group 1 Milestone 2
 * SecurityService.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a data access object designed to handle database transactions concerning Users.
 */
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use App\Models\JobModel;

class JobDAO
{
    // Function for returning an array of all Users.
    public static function getAllJobs(): ?array
    {
    //@todo: Need to implement

    $job1 = new JobModel(1, "CEO", "Programming", "GCU", "10", 1, "This would be fun");
    return [$job1, $job1];
    
    }

    // Delete job
    public static function deleteJobByID($id): ?bool
    {
        //@todo: Delete user
        return true;
    }
    
    // Function for getting a User by their ID. Takes User ID as argument and returns UserModel
    public static function getJobById($id): ?JobModel
    {
        //@todo: Return job by ID
        
        return new JobModel(1, "CEO", "Programming", "GCU", "10", 1, "This would be fun");
    }
}
