<?php
/*
 * Group 1 Milestone 3
 * EducationDAO.php Version 1
 * CST-256
 * 5/8/2021
 * This class is a data access object for handling database transactions regarding user Education.
 */
namespace App\Services\Data;

use App\Models\EducationModel;

class EducationDAO
{
    // For adding a users education history to the DB
    public static function addEducation(EducationModel $newEdu): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql = "INSERT INTO education_history (USER_ID, SCHOOL_NAME, FIELD_STUDY, DATE_GRAD, DEGREE) values (?,?,?,?,?)";

        $stmt = $connection->prepare($sql);

        // Retrieve user inputs from EducationModel
        $userID = $newEdu->getUserID();
        $school = $newEdu->getSchoolName();
        $field = $newEdu->getFieldStudy();
        $dateGrad = $newEdu->getDateGraduated();
        $degree = $newEdu->getDegreeType();

        $stmt->bind_param("issss", $userID, $school, $field, $dateGrad, $degree);

        // Execute statement and return boolean.
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Method for getting a users education history by id.
    public static function getEducationByEduID($id): ?EducationModel
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM EDUCATION_HISTORY WHERE EDU_ID=?";
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
        else
        {
            $education = $result->fetch_assoc();
            $returnedEducation = new EducationModel($education['USER_ID'], $education['SCHOOL_NAME'], $education['FIELD_STUDY'], $education['DATE_GRAD'], $education['DEGREE']);
            $returnedEducation->setEduID($education['EDU_ID']);

            // Return
            return $returnedEducation;
        }
    }

    // Method for getting a users education history by id.
    public static function getEducationByUserID($id): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM EDUCATION_HISTORY WHERE USER_ID = ? ORDER BY cast(DATE_GRAD as datetime) DESC";
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
        else
        {
            // Array to hold results
            $education_array = array();

            // Step through results and create new EducationModel
            while ($education = $result->fetch_assoc())
            {
                $returnedEducation = new EducationModel($education['USER_ID'], $education['SCHOOL_NAME'], $education['FIELD_STUDY'], $education['DATE_GRAD'], $education['DEGREE']);
                $returnedEducation->setEduID($education['EDU_ID']);

                array_push($education_array, $returnedEducation);
            }

            // Return Array
            return $education_array;
        }
    }

    // Method for updating a user's education history.
    public static function updateEducation(EducationModel $edu): bool
    {
        // Connect to database
        $con = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql = "UPDATE education_history SET SCHOOL_NAME = ?, FIELD_STUDY=?, DATE_GRAD = ?, DEGREE = ? where EDU_ID = ?";

        $stmt = $con->prepare($sql);

        // Retrieve user inputs from EducationModel
        $eduID = $edu->getEduID();
        $school = $edu->getSchoolName();
        $field = $edu->getFieldStudy();
        $dateGrad = $edu->getDateGraduated();
        $degree = $edu->getDegreeType();

        $stmt->bind_param("ssssi", $school, $field, $dateGrad, $degree, $eduID);

        // Execute statement and return boolean.
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Function to delete education instance by education id. Takes education ID as argument.
    public static function deleteEducationById($id): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM education_history WHERE EDU_ID=?";
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
