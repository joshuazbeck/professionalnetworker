<?php
/*
 * Group 1 Milestone 2
 * ProfileDAO.php Version 2
 * CST-256
 * 4/16/2021
 * This class is a data access object for handling database transactions regarding user Profiles.
 */
namespace App\Services\Data;


use App\Models\ProfileModel;

class ProfileDAO
{
    // Function for adding user Profile to database. Takes ProfileModel as argument and returns boolean
    public static function addProfile(ProfileModel $newProfile): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO profiles (USER_ID, PHONE, AGE, CITY, STATE, BIO, IS_MALE) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from ProfileModel
        $user_id = $newProfile->getUserID();
        $phone = $newProfile->getPhone();
        $age = $newProfile->getAge();
        $city = $newProfile->getCity();
        $state = $newProfile->getState();
        $bio = $newProfile->getBio();
        $is_male = $newProfile->getIsMale();

        // Bind parameters
        $stmt->bind_param("isssssi", $user_id, $phone, $age, $city, $state, $bio, $is_male);

        // Execute and return boolean
        if ($stmt->execute()) {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Function for retrieving a Profile by assoicated User ID. Takes User ID as argument and returns ProfileModel
    public static function getProfileByUserId($id): ?ProfileModel
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL String and bind parameters
        $sql_query = "SELECT * FROM profiles WHERE USER_ID = ?";
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
            // Get results as associative array
            $profile = $result->fetch_assoc();

            // Get profile from array and save to ProfileModel
            $returnedProfile = new ProfileModel($profile["USER_ID"], $profile['PHONE'], $profile['AGE'], $profile['IS_MALE'],  $profile['CITY'], $profile['STATE'], $profile['BIO']);
            $returnedProfile->setProfileID($profile['PROFILE_ID']);

            // Return results
            return $returnedProfile;
        }
    }

    // Function for updating a Profile. Takes ProfileModel as argument and returns boolean.
    public static function updateProfile(ProfileModel $userProfile): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE profiles SET PHONE=?, AGE=?, CITY=?, STATE=?, BIO=?, IS_MALE=? WHERE PROFILE_ID=?";

        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from ProfileModel
        $phone = $userProfile->getPhone();
        $age = $userProfile->getAge();
        $city = $userProfile->getCity();
        $state = $userProfile->getState();
        $bio = $userProfile->getBio();
        $is_male = $userProfile->getIsMale();
        $profileID= $userProfile->getProfileID();

        $stmt->bind_param("sisssii", $phone, $age, $city, $state, $bio, $is_male, $profileID);

        // Execute statement and return boolean.
        if ($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }
}
