<?php


namespace App\Services\Data;


use App\Models\ProfileModel;
use App\Models\UserModel;
use App\Services\Data\DatabaseConfig;

class ProfileDAO
{
// Function for adding user to database. Takes UserModel as argument and returns boolean
    public static function addProfile(ProfileModel $newProfile): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO profiles (USER_ID, PHONE, AGE, CITY, STATE, BIO) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from UserModelS
        $user_id = $newProfile->getUserID();
        $phone = $newProfile->getPhone();
        $age = $newProfile->getAge();
        $city = $newProfile->getCity();
        $state = $newProfile->getState();
        $bio = $newProfile->getBio();

        // Bind parameters
        $stmt->bind_param("isssss", $user_id, $phone, $age, $city, $state, $bio);
        // Execute and return boolean
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getProfileByUserId($id)
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
        else {
            $user = $result->fetch_assoc();

            $profile = new ProfileModel($user["USER_ID"], $user['PHONE'], $user['AGE'], 1,  $user['CITY'], $user['STATE'], $user['BIO']);

            return $profile;
        }
    }
}
