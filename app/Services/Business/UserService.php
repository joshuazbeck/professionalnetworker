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
    public function addUser(UserModel $user): bool
    {
        $userDAO = new UserDAO();

        //return $userDAO->addUserLaravel($user);

        return $userDAO->addUser($user);
    }

    // Function for checking database for specific email. Takes string as argument and returns boolean.
    public function findEmail($email): bool
    {
        $userDAO= new UserDAO();

        //return $userDAO->findEmailLaravel($email);

        return $userDAO->findEmail($email);
    }

    // Function for checking database for specific username. Takes string as argument and returns boolean.
    public function findUsername($username): bool
    {
        $userDAO = new UserDAO();

        return $userDAO->findUsername($username);
    }
}
