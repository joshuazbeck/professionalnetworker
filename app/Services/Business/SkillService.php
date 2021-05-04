<?php
/*
 * Group 1 Milestone 4
 * SkillService.php Version 1
 * CST-256
 * 5/4/2021
 * This class is a service designed to handle interactions with the database concerning skills.
 */

namespace App\Services\Business;

use App\Services\Data\SkillDAO;

class SkillService
{
    // Method for getting all skills from the database. Returns array of SkillModel
    public static function getAllSkills(): ?array
    {
        return SkillDAO::getAllSkills();
    }

    // Method for getting a user's skills. Takes user id as argument and returns SkillModel array
    public static function getSkillsByUserId($id): ?array
    {
        return SkillDAO::getUserSkillByUserID($id);
    }

    // Method for adding a skill to a user. Takes skill ID and User ID as arguments.
    public static function addUserSkill($skillID, $userID)
    {
        return SkillDAO::addUserSkill($skillID, $userID);
    }

    // Method for deleting a users skills. Takes user_skill id as argument and returns boolean.
    public static function deleteSkillByUserId($id): bool
    {
        return SkillDAO::deleteUserSkillById($id);
    }
}
