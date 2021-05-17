<?php


namespace App\Models;


class DTOModel implements \JsonSerializable
{
    public $errorCode;
    public $errorMsg;
    public $data;

    /**
     * DTOModel constructor.
     * @param $errorCode
     * @param $errorMsg
     * @param $data
     */
    public function __construct($errorCode, $errorMsg, $data)
    {
        $this->errorCode = $errorCode;
        $this->errorMsg = $errorMsg;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     */
    public function setErrorCode($errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * @param mixed $errorMsg
     */
    public function setErrorMsg($errorMsg): void
    {
        $this->errorMsg = $errorMsg;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
