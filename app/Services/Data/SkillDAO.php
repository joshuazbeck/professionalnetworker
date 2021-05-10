<?php
/*
 * Group 1 Milestone 4
 * SkillDAO.php Version 1
 * CST-256
 * 5/8/2021
 * This class is a data access object for handling database transactions regarding skills.
 */

namespace App\Services\Data;

use App\Models\SkillModel;

class SkillDAO
{
    // Method for getting and array of all available skills.
    public static function getAllSkills(): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM skills";
        $stmt = $connection->prepare($sql_query);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve skill data
        else
        {
            // Array to hold results
            $skill_array = array();

            // Step through results and create new SkillModel
            while ($skill = $result->fetch_assoc())
            {
                $returnedSkill = new SkillModel($skill['SKILL_ID'], $skill['SKILL_NAME']);

                array_push($skill_array, $returnedSkill);
            }

            return $skill_array;
        }
    }

    // Method for getting all skills associated with a user id.
    public static function getUserSkillByUserID($id): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT skills.SKILL_ID, skills.SKILL_NAME, user_skill.USER_SKILL_ID FROM skills INNER JOIN user_skill ON skills.SKILL_ID = user_skill.SKILL_ID WHERE user_skill.USER_ID = ?";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve skill data
        else
        {
            // Array to hold results
            $skill_array = array();

            // Step through results and create new SkillModel
            while ($skill = $result->fetch_assoc())
            {
                $returnedSkill = new SkillModel($skill['SKILL_ID'], $skill['SKILL_NAME'], $skill['USER_SKILL_ID']);

                array_push($skill_array, $returnedSkill);
            }

            return $skill_array;
        }
    }

    // Method for adding new skill to user.
    public static function addUserSkill($skillID, $userID)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO user_skill (SKILL_ID, USER_ID) VALUES (?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        $stmt->bind_param("ii", $skillID, $userID);

        // Execute and return boolean
        if ($stmt->execute())
        {
            return $stmt->insert_id;
        }
        else
        {
            return false;
        }
    }

    // Method for adding new skill to job posting.
    public static function addJobSkill($skillID, $jobID)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO job_skill (SKILL_ID, JOB_ID) VALUES (?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        $stmt->bind_param("ii", $skillID, $jobID);

        // Execute and return boolean
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Method for deleting a user's skill
    public static function deleteUserSkillById($id): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM user_skill WHERE USER_SKILL_ID=?";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("i", $id);

        // Execute statement return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
