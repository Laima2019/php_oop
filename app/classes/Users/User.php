<?php


namespace App\Users;


use App\DataHolder\DataHolder;

class User extends DataHolder
{
    private $data;
    private $properties = [
        'id', 'name', 'email', 'password'
    ];

    public function __construct(array $data = null)
    {
        if ($data) {
            return $this->setData($data);
        }
    }

    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }

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