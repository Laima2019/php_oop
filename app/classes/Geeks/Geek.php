<?php


namespace App\Geeks;


class Geek
{
    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'surname' => null,
                'level' => null,
                'attendance' => null,
                'score' => null,
            ];
        }
    }

    /**
     * * Sets all data from array
     * @param $array
     */
    public function setData($array) {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
        $this->setLevel($array['level'] ?? null);
        $this->setAttendance($array['attendance'] ?? null);
        $this->setScore($array['score'] ?? null);

    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'level' => $this->getLevel(),
            'attendance' => $this->getAttendance(),
            'score' => $this->getScore(),
        ];
    }

    /**
     * @param int $id
     */
    public function setId(int $id) {
        $this->data['id'] = $id;
    }

    /**
     * @return int|null
     */
    public function getId() {
        return $this->data['id'];
    }

    /**
     * Sets name
     * @param string $name
     */
    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    /**
     * Returns name
     * @return string
     */
    public function getName() {
        return $this->data['name'];
    }

    /**
     * Sets data surname
     * @param string $surname
     */
    public function setSurname(string $surname) {
        $this->data['surname'] = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->data['surname'];
    }

    /**
     * Sets data level
     * @param string $level
     */
    public function setLevel(int $level) {
        $this->data['level'] = $level;
    }

    /**
     * @return mixed
     */
    public function getLevel() {
        return $this->data['level'];
    }
    /**
     * Sets data level
     * @param string $level
     */
    public function setAttendance(int $level) {
        $this->data['level'] = $level;
    }

    /**
     * @return mixed
     */
    public function getAttendance() {
        return $this->data['level'];
    }
    /**
     * Sets data score
     * @param string $score
     */
    public function setScore(int $score) {
        $this->data['score'] = $score;
    }

    /**
     * @return mixed
     */
    public function getScore() {
        return $this->data['score'];
    }
}
