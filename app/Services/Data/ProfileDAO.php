<?php


namespace App\Services\Data;


use App\Models\ProfileModel;
use App\Models\UserModel;
use App\Services\Data\DatabaseConfig;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileDAO
{
// Function for adding user to database. Takes UserModel as argument and returns boolean
    public static function addProfile(ProfileModel $newProfile): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "INSERT INTO profiles (USER_ID, PHONE, AGE, CITY, STATE, BIO, IS_MALE) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from UserModelS
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
        } else {
            return false;
        }
    }

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
        else {
            $profile = $result->fetch_assoc();

            $returnedProfile = new ProfileModel($profile["USER_ID"], $profile['PHONE'], $profile['AGE'], $profile['IS_MALE'],  $profile['CITY'], $profile['STATE'], $profile['BIO']);
            $returnedProfile->setProfileID($profile['PROFILE_ID']);

            return $returnedProfile;
        }
    }

    public static function updateProfile(ProfileModel $userProfile): bool
    {
        // Connect to database
        $connection = DatabaseConfig::getConnection();

        // Prepare SQL string
        $sql_query = "UPDATE profiles SET PHONE=?, AGE=?, CITY=?, STATE=?, BIO=?, IS_MALE=? WHERE PROFILE_ID=?";

        $stmt = $connection->prepare($sql_query);

        // Retrieve user inputs from UserModelS
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
