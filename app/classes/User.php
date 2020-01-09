<?php


//namespace App;


class User
{
    private $credentials;

    public function __construct($array)
    {
        $this->setCredentials($array);
    }

    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
    }

    public function getCredentials()
    {
        return $this->credentials;
    }
}

