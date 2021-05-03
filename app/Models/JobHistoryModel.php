<?php
/*
 * Group 1 Milestone 3
 * JobHistoryModel.php Version 1
 * CST-256
 * 4/30/2021
 * This Model represents a users previous job.
 */

namespace App\Models;

class JobHistoryModel{
    private $jobID;
    private $userID;
    private $companyName;
    private $jobTitle;
    private $desc;
    private $startDate;
    private $stopDate;

    /**
     * JobHistoryModel constructor.
     * @param $userID
     * @param $companyName
     * @param $jobTitle
     * @param $desc
     * @param $startDate
     * @param $stopDate
     */
    public function __construct($userID, $companyName, $jobTitle, $desc, $startDate, $stopDate=null)
    {
        $this->userID = $userID;
        $this->companyName = $companyName;
        $this->jobTitle = $jobTitle;
        $this->desc = $desc;
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
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
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStopDate()
    {
        return $this->stopDate;
    }

    /**
     * @param mixed $stopDate
     */
    public function setStopDate($stopDate): void
    {
        $this->stopDate = $stopDate;
    }



}
