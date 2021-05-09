<?php
/*
 * Group 1 Milestone 2
 * SecurityService.php Version 2
 * CST-256
 * 4/24/2021
 * This class is a service designed to handle authenticating users for the website.
 */

namespace App\Services\Business;

use App\Models\LoginModel;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    // Function calls SecurityDAO to authenticate user login attempt. Returns UserModel or NULL
    public static function authenticateUser(LoginModel $loginModel): ?UserModel
    {
        // Return UserModel if successful or NULL if unsuccessful
        return SecurityDAO::authenticateUser($loginModel);
    }
}
