<?php
/*
 * Group 1 Milestone 2
 * ProfileService.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a service designed to handle interactions with the database concerning Profiles.
 */

namespace App\Services\Business;

use App\Models\ProfileModel;
use App\Services\Data\ProfileDAO;

class ProfileService
{
    // Add a Profile to the database. Takes ProfileModel as argument and returns boolean
    public static function addProfile(ProfileModel $newProfile): bool
    {
        return ProfileDAO::addProfile($newProfile);
    }

    // Get a Profile by associated User ID. Takes User ID and returns a Profile Model
    public static function getProfileByUserID($id): ?ProfileModel
    {
        return ProfileDAO::getProfileByUserId($id);
    }

    // Update Profile. Takes a ProfileModel as argument and returns a boolean.
    public static function updateProfile(ProfileModel $userProfile): bool
    {
        return ProfileDAO::updateProfile($userProfile);
    }
}
