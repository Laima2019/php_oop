<?php


namespace App\Users;


use App\DataHolder\DataHolder;

class User extends DataHolder
{

    protected $properties = [
        'id', 'name', 'email', 'password'
    ];

     public function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function setEmail(string $email)
    {
        $this->data['email'] = $email;
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function setPassword($password)
    {
        $this->data['password'] = $password;
    }

    public function getPassword()
    {
        return $this->data['password'];
    }
}