<?php


namespace App\Services\Business;


use App\Models\ProfileModel;
use App\Services\Data\ProfileDAO;

class ProfileService
{
    public static function addProfile(ProfileModel $newProfile): bool
    {
        return ProfileDAO::addProfile($newProfile);
    }

    public static function getProfileByUserID($id): ?ProfileModel
    {
        return ProfileDAO::getProfileByUserId($id);
    }
}
