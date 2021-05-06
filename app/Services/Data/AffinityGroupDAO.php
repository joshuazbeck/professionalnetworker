<?php
/*
 * Group 1 Milestone 4
 * AffinityGroupDAO.php Version 1
 * CST-256
 * 5/6/2021
 * This class is a data access object for handling database transactions regarding Affinity Groups.
 */

namespace App\Services\Data;

use App\Models\AffinityGroupModel;

class AffinityGroupDAO
{
    // Method for getting all Affinity Groups in database and returning as array.
    public static function getAllAffinityGroups(): ?array
    {
         // Connect to database
         $connection = DatabaseConfig::getConnection();

         // Prepare SQL String and bind parameters
         $sql_query = "SELECT * FROM affinity_groups";
         $stmt = $connection->prepare($sql_query);

         // Execute statement and get results.
         $stmt->execute();
         $result = $stmt->get_result();

         // If no results return null.
         if ($result->num_rows == 0) {

             return null;
         }
         // Retrieve Affinity Group data
         else
         {
             // Array to hold results
             $affinity_array = array();

             // Step through results and create new AffinityGroupModel for each result
             while ($affinityGroup = $result->fetch_assoc())
             {
                 $returnedAffinityGroup = new AffinityGroupModel($affinityGroup['AFFINITY_ID'], $affinityGroup['GROUP_NAME'], $affinityGroup['GROUP_DESC'], 0);

                 array_push($affinity_array, $returnedAffinityGroup);
             }

             // Return array of Affinity Groups
             return $affinity_array;
         }
    }

    // Method for getting all affinity group members user ids. Returns array of int.
    public static function getAffinityGroupUserIDs($affinityGroupID): ?array
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM affinity_group_members WHERE AFFINITY_ID = ?";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        $stmt->bind_param("i", $affinityGroupID);

        // Execute statement and get results.
        $stmt->execute();
        $result = $stmt->get_result();

        // If no results return null.
        if ($result->num_rows == 0) {

            return null;
        }
        // Retrieve user id data
        else
        {
            // Array to hold results
            $userID_array = array();

            // Step through results and add user id to array
            while ($groupMember = $result->fetch_assoc())
            {
                array_push($userID_array, $groupMember['USER_ID']);
            }

            // Return array of user ids
            return $userID_array;
        }
    }


    // Method for returning a Affinity Group by its id number. Takes id number as argument and returns AffinityGroupModel
    public static function getAffinityGroupByID($id): ?AffinityGroupModel
    {
         // Connect to database
         $connection = DatabaseConfig::getConnection();

         // Prepare SQL String and bind parameters
         $sql_query = "SELECT * FROM affinity_groups WHERE AFFINITY_ID=?";
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
         // Retrieve Affinity Group data
         else
         {
             $affinityGroup = $result->fetch_assoc();

             $returnedGroup = new AffinityGroupModel($affinityGroup['AFFINITY_ID'], $affinityGroup['GROUP_NAME'], $affinityGroup['GROUP_DESC'], 0);

             return $returnedGroup;
         }
    }

    // Method for adding a Affinity Group to the database. Takes AffinityGroupModel as argument and returns inserted ID.
    public static function addAffinityGroup(AffinityGroupModel $affinityGroup)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO affinity_groups (GROUP_NAME, GROUP_DESC) VALUES (?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from AffinityGroupModel
        $groupName = $affinityGroup->getAffinityGroupName();
        $groupDesc = $affinityGroup->getAffinityGroupDesc();

        // Bind parameters
        $stmt->bind_param("ss", $groupName, $groupDesc);

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

    // Method for updating an Affinity Group. Takes AffinityGroupModel and returns bool.
    public static function updateAffinityGroup(AffinityGroupModel $groupModel)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE affinity_groups SET GROUP_NAME=?, GROUP_DESC=? WHERE AFFINITY_ID=?";

        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from AffinityGroupModel
        $groupID = $groupModel->getAffinityGroupID();
        $groupName = $groupModel->getAffinityGroupName();
        $groupDesc = $groupModel->getAffinityGroupDesc();

        // Bind parameters
        $stmt->bind_param("ssi", $groupName, $groupDesc, $groupID);

        // Execute statement and return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Method for adding a User to Affinity Group. Takes Affinity Group id and user id.
    public static function addUserToAffinityGroup($affinity_ID, $user_ID)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO affinity_group_members (AFFINITY_ID, USER_ID) VALUES (?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Bind parameters
        $stmt->bind_param("ii", $affinity_ID, $user_ID);

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

    // Method for removing a user from an Affinity Group. Takes Affinity Group id and user id.
    public static function removeUserFromAffinityGroup($group_id, $user_ID)
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM affinity_group_members WHERE AFFINITY_ID=? AND USER_ID=?";
        $stmt = $connection->prepare($sql_query);

        $stmt->bind_param("ii", $group_id, $user_ID);

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

    // Function to delete Affinity Group by its id. Takes Affinity Group ID as argument.
    public static function deleteAffinityGroupById($id): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "DELETE FROM affinity_groups WHERE AFFINITY_ID=?";
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
