<?php
/*
 * Group 1 Milestone 4
 * EducationGroupModel.php Version 1
 * CST-256
 * 5/6/2021
 * This Model represents a instance of Education for the site.
 */


namespace App\Models;


class EducationModel
{
    private $eduID;
    private $userID;
    private $schoolName;
    private $fieldStudy;
    private $dateGraduated;
    private $degreeType;

    /**
     * EducationModel constructor.
     * @param $userID
     * @param $schoolName
     * @param $fieldStudy
     * @param $dateGraduated
     * @param $degreeType
     */
    public function __construct($userID, $schoolName, $fieldStudy, $dateGraduated, $degreeType)
    {
        $this->userID = $userID;
        $this->schoolName = $schoolName;
        $this->fieldStudy = $fieldStudy;
        $this->dateGraduated = $dateGraduated;
        $this->degreeType = $degreeType;
    }

    /**
     * @return mixed
     */
    public function getEduID()
    {
        return $this->eduID;
    }

    /**
     * @param mixed $eduID
     */
    public function setEduID($eduID): void
    {
        $this->eduID = $eduID;
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
    public function getSchoolName()
    {
        return $this->schoolName;
    }

    /**
     * @param mixed $schoolName
     */
    public function setSchoolName($schoolName): void
    {
        $this->schoolName = $schoolName;
    }

    /**
     * @return mixed
     */
    public function getFieldStudy()
    {
        return $this->fieldStudy;
    }

    /**
     * @param mixed $fieldStudy
     */
    public function setFieldStudy($fieldStudy): void
    {
        $this->fieldStudy = $fieldStudy;
    }

    /**
     * @return mixed
     */
    public function getDateGraduated()
    {
        return $this->dateGraduated;
    }

    /**
     * @param mixed $dateGraduated
     */
    public function setDateGraduated($dateGraduated): void
    {
        $this->dateGraduated = $dateGraduated;
    }

    /**
     * @return mixed
     */
    public function getDegreeType()
    {
        return $this->degreeType;
    }

    /**
     * @param mixed $degreeType
     */
    public function setDegreeType($degreeType): void
    {
        $this->degreeType = $degreeType;
    }


}
