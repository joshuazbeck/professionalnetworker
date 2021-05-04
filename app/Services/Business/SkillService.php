<?php


namespace App\Services\Business;


use App\Services\Data\SkillDAO;

class SkillService
{
    public static function getAllSkills(): ?array
    {
        return SkillDAO::getAllSkills();
    }

    public static function getSkillsByUserId($id): ?array
    {
        return SkillDAO::getUserSkillByUserID($id);
    }

    public static function addUserSkill($skillID, $userID)
    {
        return SkillDAO::addUserSkill($skillID, $userID);
    }

    public static function deleteSkillByUserId($id): bool
    {
        return SkillDAO::deleteUserSkillById($id);
    }
}
