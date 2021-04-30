<?php
/*
 * Group 1 Milestone 2
 * ProfileModel.php Version 1
 * CST-256
 * 4/24/2021
 * This Model represents a UserProfile for the site.
 */

namespace App\Models;


class JobModel
{
    
    private $jobID;

    private $jobTitle;

    private $desiredSkill;

    private $company;

    private $payHourly;

    //0 - full-time, 1 - part-time, 2 - internship
    private $status;

    private $jobDescription;
    
    
    public function __construct($jobID, $jobTitle, $desiredSkill, $company, $payHourly, $status, $jobDescription){
        $this->jobID = $jobID;
        $this->jobTitle = $jobTitle;
        $this->desiredSkill = $desiredSkill;
        $this->company = $company;
        $this->payHourly = $payHourly;
        $this->status = $status;
        $this->jobDescription = $jobDescription;
    }/**
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



    
}
