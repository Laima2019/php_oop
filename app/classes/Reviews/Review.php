<?php

namespace App\Reviews;

class Review {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'review' => null,
                'time_stamp' => null,
                'user_id' => null,
                'rate' => null,
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
        $this->setReview($array['review'] ?? null);
        $this->setTimeStamp($array['time_stamp'] ?? null);
        $this->setUserId($array['user_id'] ?? null);
        $this->setRate($array['rate'] ?? null);

    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'id' => $this->getId(),
            'review' => $this->getReview(),
            'time_stamp' => $this->getTimeStamp(),
            'user_id' => $this->getUserId(),
            'rate' =>$this->getRate(),
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
     * @param string $review
     */
    public function setReview(string $review) {
        $this->data['review'] = $review;
    }

    /**
     * Returns name
     * @return string
     */
    public function getReview() {
        return $this->data['review'];
    }

    /**
     * Sets data surname
     * @param string $time_stamp
     */
    public function setTimeStamp(string $time_stamp) {
        $this->data['time_stamp'] = $time_stamp;
    }

    /**
     * @return mixed
     */
    public function getTimeStamp() {
        return $this->data['time_stamp'];
    }

    /**
     * Sets data city
     * @param string $city
     */
    public function setUserId(string $user_id) {
        $this->data['user_id'] = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->data['user_id'];
    }

    public function setRate(int $rate) {
        $this->data['rate'] = $rate;
    }

    public function getRate() {
        return $this->data['rate'];
    }
}
