<?php
/*
 * Group 1 Milestone 1
 * SecurityService.php Version 1
 * CST-256
 * 4/16/2021
 * This class is a service designed to handle authenticating users for the website.
 */

namespace App\Services\Business;
use App\Models\LoginModel;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    // Function calls SecurityDAO to authenticate user login attempt. Returns UserModel or NULL
    public function authenticateUser(LoginModel $loginModel): ?UserModel
    {
        $securityDAO = new SecurityDAO();

        // Return UserModel if successful or NULL if unsuccessful
        return $securityDAO->authenticateUser($loginModel);
    }
}
