<?php


namespace App\Services\Business;

use App\Models\EducationModel;
use App\Services\Data\EducationDAO;

class EducationService
{
    public static function addEducation(EducationModel $edu): bool
    {
        return EducationDAO::addEducation($edu);
    }

    public static function getEducationByUserID($id): ?array
    {
        return EducationDAO::getEducationByUserID($id);
    }

    public static function deleteEducationByID($id): bool
    {
        return EducationDAO::deleteEducationById($id);
    }

    public static function updateEducation(EducationModel $edu): bool
    {
        return EducationDAO::updateEducation($edu);
    }

    public static function getEducationByEduID($id): ?EducationModel
    {
        return EducationDAO::getEducationByEduID($id);
    }
}
