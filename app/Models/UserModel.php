<?php
/*
 * Group 1 Milestone 2
 * UserModel.php Version 2
 * CST-256
 * 4/24/2021
 * This Model represents a User for the site.
 */
namespace App\Models;

class UserModel
{

    private $userID;

    private $firstName;

    private $lastName;

    private $password;

    private $email;

    private $userRole;

    private $suspended; // Track if user has been suspended

    private $profile_complete; // Track if user completed creating a profile

    /**
     * UserModel constructor.
     * @param $firstName
     * @param $lastName
     * @param $password
     * @param $email
     */
    public function __construct($firstName, $lastName, $email, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     *
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     *
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }

    /**
     *
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     *
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     *
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     *
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
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
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param mixed $userRole
     */
    public function setUserRole($userRole): void
    {
        $this->userRole = $userRole;
    }

    /**
     * @return mixed
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param mixed $suspended
     */
    public function setSuspended($suspended): void
    {
        $this->suspended = $suspended;
    }

    /**
     * @return mixed
     */
    public function getProfileComplete()
    {
        return $this->profile_complete;
    }

    /**
     * @param mixed $profile_complete
     */
    public function setProfileComplete($profile_complete): void
    {
        $this->profile_complete = $profile_complete;
    }

}
