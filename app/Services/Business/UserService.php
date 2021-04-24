<?php
/*
 * Group 1 Milestone 2
 * UserService.php Version 2
 * CST-256
 * 4/24/2021
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

    // Function for updating the status of user completing a Profile. Takes userID and boolean as input. Returns boolean
    public static function updateProfileComplete($userID, $value): bool
    {
        return UserDAO::updateProfileComplete($userID, $value);
    }

    // Function for getting an array of all users in the database. Returns array of users
    public static function getAllUsers(): ?array
    {
        return UserDAO::getAllUsers();
    }

    // Function for deleting a User from the database. Takes User ID as argument and returns boolean.
    public static function deleteUser($id): bool
    {
        return UserDAO::deleteUserById($id);
    }

    // Function for getting a User by their ID from the database. Takes User ID and returns a UserModel
    public static function getUserById($id): ?UserModel
    {
        return UserDAO::getUserById($id);
    }

    // Function for updating a User's information in the database. Takes a UserModel as arugment and returns boolean.
    public static function updateUser(UserModel $userModel): bool
    {
        return UserDAO::updateUser($userModel);
    }
}
