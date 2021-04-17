<?php
/*
 * Group 1 Milestone 1
 * LoginModel.php Version 1
 * CST-256
 * 4/16/2021
 * This Model is used to handle login attempts.
 */
namespace App\Models;

class LoginModel
{

    private $email;

    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    // Getters and setters
    /**
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param mixed $username
     */
    public function setUsername($email): void
    {
        $this->username = $email;
    }

    /**
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}
