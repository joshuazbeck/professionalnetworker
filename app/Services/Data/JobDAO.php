<?php
/*
 * Group 1 Milestone 3
 * JobDAO.php Version 1
 * CST-256
 * 4/30/2021
 * This class is a data access object for handling database transactions regarding jobs.
 */

namespace App\Services\Data;

use App\Models\JobModel;

class JobDAO
{
    // Method for getting all jobs in database and returning as array.
    public static function getAllJobs(): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM jobs";
        $stmt = $connection->prepare($sql_query);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve job data
        else
        {
            // Array to hold results
            $job_array = array();

            // Step through results and create new Job for each result
            while ($job = $result->fetch_assoc())
            {
                $returnedJob = new JobModel($job['JOB_ID'], $job['TITLE'], $job['DESIRED_SKILL'], $job['COMPANY'], $job['PAY'], $job['STATUS'], $job['DESCRIPTION'], $job['CITY'], $job['STATE']);

                array_push($job_array, $returnedJob);
            }

            // Return array of jobs
            return $job_array;
        }
    }

    // Method for returning a job by its id number. Takes id number as argument and returns JobModel
    public static function getJobById($id): ?JobModel
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM jobs WHERE JOB_ID=?";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve job data
        else
        {
            $job = $result->fetch_assoc();

            $returnedJob = new JobModel($job['JOB_ID'], $job['TITLE'], $job['DESIRED_SKILL'], $job['COMPANY'], $job['PAY'], $job['STATUS'], $job['DESCRIPTION'], $job['CITY'], $job['STATE']);

            return $returnedJob;
        }
    }

    // Method for adding a job to the database. Takes Job as argument and returns inserted ID.
    public static function addJob(JobModel $job)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO jobs (TITLE, COMPANY, CITY, STATE, PAY, STATUS, DESCRIPTION, DESIRED_SKILL) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from job
        $title = $job->getJobTitle();
        $company = $job->getCompany();
        $city = $job->getCity();
        $state = $job->getState();
        $pay = $job->getPayHourly();
        $status = $job->getStatus();
        $description = $job->getJobDescription();
        $desiredSkill = $job->getDesiredSkill();

        // Bind parameters
        $stmt->bind_param("ssssisss", $title, $company, $city, $state, $pay, $status, $description, $desiredSkill);

        // Execute and return boolean
        if ($stmt->execute())
        {
            return $stmt->insert_id;
        }
        else
        {
            return false;
        }
    }

    // Method for deleting a job by its ID number. Takes ID number as argument returns boolean
    public static function deleteJobById($id): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM jobs WHERE JOB_ID=?";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("i", $id);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Method for updating a job by its ID number. Takes JobModel as argument and returns boolean.
    public static function updateJobById(JobModel $job): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE jobs SET TITLE=?, COMPANY=?, CITY=?, STATE=?, PAY=?, STATUS=?, DESCRIPTION=?, DESIRED_SKILL=? WHERE JOB_ID=?";

        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from job
        $title = $job->getJobTitle();
        $company = $job->getCompany();
        $city = $job->getCity();
        $state = $job->getState();
        $pay = $job->getPayHourly();
        $status = $job->getStatus();
        $description = $job->getJobDescription();
        $desiredSkill = $job->getDesiredSkill();
        $jobID = $job->getJobID();
        // Bind parameters
        $stmt->bind_param("ssssisssi", $title, $company, $city, $state, $pay, $status, $description, $desiredSkill, $jobID);

        // Execute statement and return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Match user with jobs by skills. Takes user id as argument and returns array of JobModel
    public static function matchUserJobSkill($userID): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM jobs INNER JOIN (SELECT DISTINCT JOB_ID FROM job_skill INNER JOIN user_skill ON job_skill.SKILL_ID = user_skill.SKILL_ID WHERE user_skill.USER_ID = ?) JobQuery ON jobs.JOB_ID = JobQuery.JOB_ID";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("i", $userID);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0)
        {
            return null;
        }
        // Retrieve job data
        else
        {
            // Array to hold results
            $job_array = array();

            // Step through results and create new Job for each result
            while ($job = $result->fetch_assoc())
            {
                $returnedJob = new JobModel($job['JOB_ID'], $job['TITLE'], $job['DESIRED_SKILL'], $job['COMPANY'], $job['PAY'], $job['STATUS'], $job['DESCRIPTION'], $job['CITY'], $job['STATE']);

                array_push($job_array, $returnedJob);
            }

            // Return array of jobs
            return $job_array;
        }
    }

    // Method for searching jobs by keyword and column. Takes search stringa and column name as arguments.
    public static function searchJobsByKeyword($searchString, $searchColumn)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM jobs WHERE $searchColumn LIKE ?";
        $stmt = $connection->prepare($sql_query);

        $searchString = "%" . $searchString . "%";
        $stmt->bind_param("s", $searchString);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0)
        {
            return null;
        }
        // Retrieve job data
        else
        {
            // Array to hold results
            $job_array = array();

            // Step through results and create new Job for each result
            while ($job = $result->fetch_assoc())
            {
                $returnedJob = new JobModel($job['JOB_ID'], $job['TITLE'], $job['DESIRED_SKILL'], $job['COMPANY'], $job['PAY'], $job['STATUS'], $job['DESCRIPTION'], $job['CITY'], $job['STATE']);

                array_push($job_array, $returnedJob);
            }

            // Return array of jobs
            return $job_array;
        }
    }

}
