<?php
/*
 * Group 1 Milestone 4
 * EducationService.php Version 1
 * CST-256
 * 5/4/2021
 * This class is a service designed to handle interactions with the database concerning education.
 */
namespace App\Services\Business;

use App\Models\EducationModel;
use App\Services\Data\EducationDAO;

class EducationService
{
    // Method for adding a instance of education to user. Takes EducationModel as argument and returns boolean.
    public static function addEducation(EducationModel $edu): bool
    {
        return EducationDAO::addEducation($edu);
    }

    // Method for getting a specific user's education. Takes user id as argument and returns array of EducationModel
    public static function getEducationByUserID($id): ?array
    {
        return EducationDAO::getEducationByUserID($id);
    }

    // Method for deleted an instance of education by its ID. Takes education id as argument and returns boolean.
    public static function deleteEducationByID($id): bool
    {
        return EducationDAO::deleteEducationById($id);
    }

    // Method for updating an instance of EducationModel. Takes EducationModel as argument and returns boolean.
    public static function updateEducation(EducationModel $edu): bool
    {
        return EducationDAO::updateEducation($edu);
    }

    // Method for getting and instance of EducationModel by its ID. Takes education id as argument and returns boolean.
    public static function getEducationByEduID($id): ?EducationModel
    {
        return EducationDAO::getEducationByEduID($id);
    }
}
