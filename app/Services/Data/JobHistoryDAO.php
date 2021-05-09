<?php
/*
 * Group 1 Milestone 4
 * JobHistoryDAO.php Version 1
 * CST-256
 * 5/8/2021
 * This class is a data access object for handling database transactions regarding job histories.
 */

namespace App\Services\Data;

use App\Models\JobHistoryModel;

class JobHistoryDAO
{
    // For adding a users job history to the DB
    public static function addJobHistory(JobHistoryModel $newJob): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql = "INSERT INTO job_history (JOB_TITLE, COMPANY_NAME, JOB_DESC, DATE_START, DATE_STOP, FK_USERID) values (?,?,?,?,?,?)";

        $stmt = $connection->prepare($sql);

        // Retrieve user inputs from ProfileModel
        $jobTitle = $newJob->getJobTitle();
        $companyName = $newJob->getCompanyName();
        $dateStart = $newJob->getStartDate();
        $dateStop = $newJob->getStopDate();
        $desc = $newJob->getDesc();
        $userID = $newJob->getUserID();

        $stmt->bind_param("sssssi", $jobTitle, $companyName, $desc, $dateStart, $dateStop, $userID);

        // Execute statement and return boolean.
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    // Method for updating a user's job history.
    public static function updateJobHistory(JobHistoryModel $job): bool
    {
        // Connect to database
        $con = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql = "UPDATE job_history SET JOB_TITLE = ?, COMPANY_NAME = ?, DATE_START = ?, DATE_STOP = ?, JOB_DESC = ? where JOB_HISTORY_ID = ?";

        $stmt = $con->prepare($sql);

        // Retrieve user inputs from JobHistoryModel
        $jobTitle = $job->getJobTitle();
        $companyName = $job->getCompanyName();
        $dateStart = $job->getStartDate();
        $dateStop = $job->getStopDate();
        $desc = $job->getDesc();
        $jobID = $job->getJobID();

        $stmt->bind_param("sssssi", $jobTitle, $companyName, $dateStart, $dateStop, $desc, $jobID);

        // Execute statement and return boolean.
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Method for getting job history by id
    public static function getJobHistoryByJobID($id)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM JOB_HISTORY WHERE JOB_HISTORY_ID = ?";
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
        else
        {
            $jobHistory = $result->fetch_assoc();

            $returnedJobHistory = new JobHistoryModel($jobHistory['FK_USERID'], $jobHistory['COMPANY_NAME'], $jobHistory['JOB_TITLE'], $jobHistory['JOB_DESC'], $jobHistory['DATE_START'], $jobHistory['DATE_STOP']);
            $returnedJobHistory->setJobID($jobHistory['JOB_HISTORY_ID']);

            return $returnedJobHistory;
        }
    }

    // Method for getting a users job history by user id.
    public static function getJobHistoryByUserID($id): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM JOB_HISTORY WHERE FK_USERID = ? ORDER BY (CASE WHEN DATE_STOP IS NULL THEN 1 ELSE 0 END) DESC, cast(DATE_STOP as datetime) DESC";
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
        else
        {
            // Array to hold results
            $history_array = array();

            // Step through results and create new JobHistoryModel
            while ($jobHistory = $result->fetch_assoc())
            {
                $returnedJobHistory = new JobHistoryModel($jobHistory['FK_USERID'], $jobHistory['COMPANY_NAME'], $jobHistory['JOB_TITLE'], $jobHistory['JOB_DESC'], $jobHistory['DATE_START'], $jobHistory['DATE_STOP']);
                $returnedJobHistory->setJobID($jobHistory['JOB_HISTORY_ID']);

                array_push($history_array, $returnedJobHistory);
            }

            // Return Array
            return $history_array;
        }
    }

    // Function to delete job history by its ID. Takes job history ID as argument.
    public static function deleteJobHistoryByJobId($id): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM job_history WHERE JOB_HISTORY_ID=?";
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
}
