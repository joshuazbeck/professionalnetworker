<?php
/*
 * Group 1 Milestone 4
 * SkillModel.php Version 1
 * CST-256
 * 5/6/2021
 * This Model represents a skill for a user..
 */
namespace App\Models;


class SkillModel
{
    public $skillId;
    private $name;
    private $associatedId; // User or Job associated ID

    /**
     * SkillModel constructor.
     * @param $skillId
     * @param $name
     * @param $associatedId
     */
    public function __construct($skillId = null, $name = null, $associatedId = null)
    {
        $this->skillId = $skillId;
        $this->name = $name;
        $this->associatedId = $associatedId;
    }

    /**
     * @return mixed
     */
    public function getSkillId()
    {
        return $this->skillId;
    }

    /**
     * @param mixed $skillId
     */
    public function setSkillId($skillId): void
    {
        $this->skillId = $skillId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAssociatedId()
    {
        return $this->associatedId;
    }

    /**
     * @param mixed $associatedId
     */
    public function setAssociatedId($associatedId): void
    {
        $this->associatedId = $associatedId;
    }

}
