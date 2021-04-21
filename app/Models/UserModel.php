<?php
/*
 * Group 1 Milestone 1
 * UserModel.php Version 1
 * CST-256
 * 4/16/2021
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

    private $phone;

    private $age;

    private $is_male;

    private $city;

    private $state;
    
    private $userRole;


    // Getters and setters

    /**
     * UserModel constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $password
     * @param $phone
     * @param $age
     * @param $is_male
     * @param $city
     * @param $state
     */
    public function __construct($firstName, $lastName, $email, $password, $phone, $age, $is_male, $city, $state)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->age = $age;
        $this->is_male = $is_male;
        $this->city = $city;
        $this->state = $state;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getIsMale()
    {
        return $this->is_male;
    }

    /**
     * @param mixed $is_male
     */
    public function setIsMale($is_male): void
    {
        $this->is_male = $is_male;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }
    
    //@todo Need to ensure this numerical value of 3 for admin matches the database schema/stratagy
    static public function isUserRoleAdmin($userRole){
        if ($userRole == 3){
            return true;
        } else {
            return false;
        }
    }
    /**
     * @return int
     */
    public function getUserRole()
    {
        return $this->userRole;
    }
    
    /**
     * @param int $userRole
     */
    public function setUserRole($userRole): void
    {
        $this->userRole = $userRole;
    }

}
