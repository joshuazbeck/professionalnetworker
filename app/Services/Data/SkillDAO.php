<?php


namespace App\Services\Data;


use App\Models\SkillModel;

class SkillDAO
{
    public static function getAllSkills()
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
        // Retrieve job data and verify password
        else
        {
            // Array to hold results
            $skill_array = array();

            // Step through results and create new UserModel
            while ($skill = $result->fetch_assoc())
            {
                $returnedSkill = new SkillModel($skill['SKILL_ID'], $skill['SKILL_NAME']);
                //$returnedSkill->setSkillId($skill['SKILL_ID']);

                array_push($skill_array, $returnedSkill);
            }

            return $skill_array;
        }
    }

    public static function getUserSkillByUserID($id)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT skills.SKILL_ID, skills.SKILL_NAME, user_skill.USER_SKILL_ID FROM skills INNER JOIN user_skill ON skills.SKILL_ID = user_skill.SKILL_ID WHERE user_skill.USER_ID = 10";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        //$stmt->bind_param("i", $id);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve job data and verify password
        else
        {
            // Array to hold results
            $skill_array = array();

            // Step through results and create new UserModel
            while ($skill = $result->fetch_assoc())
            {
                $returnedSkill = new SkillModel($skill['SKILL_ID'], $skill['SKILL_NAME'], $skill['USER_SKILL_ID']);
                //$returnedSkill->setSkillId($skill['SKILL_ID']);

                array_push($skill_array, $returnedSkill);
            }

            return $skill_array;
        }
    }

    public static function addUserSkill($skillID, $userID)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO user_skill (SKILL_ID, USER_ID) VALUES (?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from job

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

    public static function deleteUserSkillById($id)
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
