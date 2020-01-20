<?php

class Zmogus {

    public $name;
    public $surname;

    public function __construct($vardas)
    {
        $this->name = $vardas;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}

$zmogus = new Zmogus('Bomzas');
print $zmogus->getName();

$array = [
        0 => $zmogus
];
print $array[0]->getName();

$users = [];
$users[] = new User();
