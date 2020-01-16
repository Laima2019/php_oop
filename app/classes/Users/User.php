<?php


namespace App\Users;


class User
{
    private $data;
    private $properties = [
        'id', 'name', 'email', 'password'
        ];
    public function __construct(array $data = null)
    {
        if($data){
            return $this->setData($data);
        }
    }
    public function setId(int $id) {
        $this->data['id'] = $id;
    }
    public function getId(){
        return $this->data['id'] ?? null;
    }
    public function setName(string $name) {
        $this->data['name'] = $name;
    }
    public function getName (){
        return $this->data['name'];
    }
    public function setEmail(string $email){
        $this->data['email'] =$email;
    }
    public function getEmail(){
        return $this->data['email'];
    }
    public function setPassword($password){
        $this->data['password'] = $password;
    }
    public function getPassword(){
        return $this->data['password'];
    }
    public function setData(array $data){
        foreach ($this->properties as $property){
            if(isset($data[$property])){
                $value = $data[$property];
                $setter =str_replace('_', '', 'set' . $property);
               $this->{$setter}($value);
            }
        }
    }
    public function getData(): array
    {
        $data = [];
        foreach ($this->properties as $property) {
            $getter = str_replace('_', '', 'get' . $property);
            $data[$property] = $this->{$getter}();
        }
        return $data;
    }
}