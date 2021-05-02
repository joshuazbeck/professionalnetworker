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
    private $companyName;
    private $jobTitle;
    private $years;
    private $desc;

    public function __construct($companyName, $jobTitle, $years, $desc){
        $this->companyName = $companyName;
        $this->jobTitle = $jobTitle;
        $this->years = $years;
        $this->desc = $desc;
    }

    public function getJobID(){
        return $this->jobID;
    }
    public function getCompanyName(){
        return $this->companyName;
    }
    public function getJobTitle(){
        return $this->jobTitle;
    }
    public function getYears(){
        return $this->years;
    }
    public function getDesc(){
        return $this->desc;
    }

    public function setJobID($jobID){
        $this->jobID = $jobID;
    }
    public function setCompanyName($companyName){
        $this->companyName = $companyName;
    }
    public function setJobTitle($jobTitle){
        $this->jobTitle = $jobTitle;
    }
    public function setYears($years){
        $this->years = $years;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }

}