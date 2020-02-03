<?php

namespace App\Users;

class User {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'surname' => null,
                'email' => null,
                'phone' => null,
                'country' => null,
                'password' => null
            ];
        }
    }

    public function setData($array) {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
        $this->setEmail($array['email'] ?? null);
        $this->setPhone($array['phone'] ?? null);
        $this->setCountry($array['country'] ?? null);
        $this->setPassword($array['password'] ?? null);
    }

    public function getData() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'country' => $this->getCountry(),
            'password' => $this->getPassword()
        ];
    }

    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    public function getId() {
        return $this->data['id'];
    }

    public function setName(String $name) {
        $this->data['name'] = $name;
    }

    public function setSurname(String $surname) {
        $this->data['surname'] = $surname;
    }

    public function setEmail(String $email) {
        $this->data['email'] = $email;
    }

    public function setPhone(string $phone) {
        $this->data['phone'] = $phone;
    }

    public function setCountry(String $country) {
        $this->data['country'] = $country;
    }
    public function setPassword(String $password) {
        $this->data['password'] = $password;
    }

    public function getName() {
        return $this->data['name'];
    }

    public function getSurname() {
        return $this->data['surname'];
    }

    public function getEmail() {
        return $this->data['email'];
    }

    public function getPhone() {
        return $this->data['phone'];
    }

    public function getCountry() {
        return $this->data['country'];
    }

    public function getPassword() {
        return $this->data['password'];
    }

}
