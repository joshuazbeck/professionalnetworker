<?php
/*
 * Group 1 Milestone 5
 * JobModel.php Version 2
 * CST-256
 * 5/12/2021
 * This Model represents a Job for the site.
 */

namespace App\Models;


class JobModel implements \JsonSerializable
{

    private $jobID;

    private $jobTitle;

    private $desiredSkill;

    private $company;

    private $payHourly;

    //0 - full-time, 1 - part-time, 2 - internship
    private $status;

    private $jobDescription;

    private $city;

    private $state;

    // Array to hold applicable job applications
    protected $appArray;

    /**
     * JobModel constructor.
     * @param $jobID
     * @param $jobTitle
     * @param $desiredSkill
     * @param $company
     * @param $payHourly
     * @param $status
     * @param $jobDescription
     * @param $city
     * @param $state
     */
    public function __construct($jobID, $jobTitle, $desiredSkill, $company, $payHourly, $status, $jobDescription, $city, $state)
    {
        $this->jobID = $jobID;
        $this->jobTitle = $jobTitle;
        $this->desiredSkill = $desiredSkill;
        $this->company = $company;
        $this->payHourly = $payHourly;
        $this->status = $status;
        $this->jobDescription = $jobDescription;
        $this->city = $city;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getJobID()
    {
        return $this->jobID;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @return mixed
     */
    public function getDesiredSkill()
    {
        return $this->desiredSkill;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return mixed
     */
    public function getPayHourly()
    {
        return $this->payHourly;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getJobDescription()
    {
        return $this->jobDescription;
    }

    /**
     * @param mixed $jobID
     */
    public function setJobID($jobID)
    {
        $this->jobID = $jobID;
    }

    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @param mixed $desiredSkill
     */
    public function setDesiredSkill($desiredSkill)
    {
        $this->desiredSkill = $desiredSkill;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @param mixed $payHourly
     */
    public function setPayHourly($payHourly)
    {
        $this->payHourly = $payHourly;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param mixed $jobDescription
     */
    public function setJobDescription($jobDescription)
    {
        $this->jobDescription = $jobDescription;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getAppArray()
    {
        return $this->appArray;
    }

    /**
     * @param mixed $appArray
     */
    public function setAppArray($appArray): void
    {
        $this->appArray = $appArray;
    }

    // Method for returning data for serialization
    public function jsonSerialize(): array
    {
        return [
            'JobID' => $this->jobID,
            'JobTitle' => $this->jobTitle,
            'Company' => $this->company,
            'HourlyPay' => $this->payHourly,
            'Status' => $this->status,
            'JobDescription' => $this->city,
            'City' => $this->city,
            'State' => $this->state
        ];
    }
}
