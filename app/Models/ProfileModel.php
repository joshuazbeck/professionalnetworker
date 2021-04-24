<?php
/*
 * Group 1 Milestone 2
 * ProfileModel.php Version 1
 * CST-256
 * 4/24/2021
 * This Model represents a UserProfile for the site.
 */

namespace App\Models;


class ProfileModel
{
    // Profile specific variables
    private $userID;

    private $profileID;

    private $phone;

    private $age;

    private $is_male;

    private $city;

    private $state;

    private $bio;

    /**
     * ProfileModel constructor.
     * @param $userID
     * @param $phone
     * @param $age
     * @param $is_male
     * @param $city
     * @param $state
     * @param $bio
     */
    public function __construct($userID, $phone, $age, $is_male, $city, $state, $bio)
    {
        $this->userID = $userID;
        $this->phone = $phone;
        $this->age = $age;
        $this->is_male = $is_male;
        $this->city = $city;
        $this->state = $state;
        $this->bio = $bio;
    }

    // Getters and setters
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

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getProfileID()
    {
        return $this->profileID;
    }

    /**
     * @param mixed $profileID
     */
    public function setProfileID($profileID): void
    {
        $this->profileID = $profileID;
    }

}
