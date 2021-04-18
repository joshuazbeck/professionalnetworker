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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
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
