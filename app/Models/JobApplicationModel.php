<?php
/*
 * Group 1 Milestone 5
 * JobApplicationModel.php Version 1
 * CST-256
 * 5/12/2021
 * This Model represents a job application.
 */
namespace App\Models;

class JobApplicationModel
{
    private $applicationID;
    private $jobID;
    private $userID;
    private $firstName;
    private $lastName;
    private $resumeFilePath;

    /**
     * JobApplicationModel constructor.
     * @param $applicationID
     * @param $jobID
     * @param $userID
     * @param $firstName
     * @param $lastName
     * @param $resumeFilePath
     */
    public function __construct($applicationID, $jobID, $userID, $firstName, $lastName, $resumeFilePath)
    {
        $this->applicationID = $applicationID;
        $this->jobID = $jobID;
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->resumeFilePath = $resumeFilePath;
    }

    /**
     * @return mixed
     */
    public function getApplicationID()
    {
        return $this->applicationID;
    }

    /**
     * @param mixed $applicationID
     */
    public function setApplicationID($applicationID): void
    {
        $this->applicationID = $applicationID;
    }

    /**
     * @return mixed
     */
    public function getJobID()
    {
        return $this->jobID;
    }

    /**
     * @param mixed $jobID
     */
    public function setJobID($jobID): void
    {
        $this->jobID = $jobID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getResumeFilePath()
    {
        return $this->resumeFilePath;
    }

    /**
     * @param mixed $resumeFilePath
     */
    public function setResumeFilePath($resumeFilePath): void
    {
        $this->resumeFilePath = $resumeFilePath;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

}
