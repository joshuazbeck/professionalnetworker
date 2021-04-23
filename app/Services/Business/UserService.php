<?php
/*
 * Group 1 Milestone 1
 * UserService.php Version 1
 * CST-256
 * 4/16/2021
 * This class is a service designed to handle all actions regarding the UserModel.
 */
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\UserDAO;

class UserService
{

    // Function for adding a new user to the database. Takes UserModel as argument and returns boolean.
    public static function addUser(UserModel $user): bool
    {
        return UserDAO::addUser($user);
    }

    // Function for checking database for specific email. Takes string as argument and returns boolean.
    public static function findEmail($email): bool
    {
        return UserDAO::findEmail($email);
    }

    public static function updateProfileComplete($userID, $value): bool
    {
        return UserDAO::updateProfileComplete($userID, $value);
    }

    public static function getAllUsers(): ?array
    {
        return UserDAO::getAllUsers();
    }

    public static function deleteUser($id): bool
    {
        return UserDAO::deleteUserById($id);
    }

    public static function getUserById($id): ?UserModel
    {
        return UserDAO::getUserById($id);
    }

    public static function updateUser(UserModel $userModel): bool
    {
        return UserDAO::updateUser($userModel);
    }
}
