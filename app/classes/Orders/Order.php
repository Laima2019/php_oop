<?php


namespace App\Orders;


use App\DataHolder\DataHolder;

class Order extends DataHolder
{
     protected $properties = [
        'id',
        'drink_id',
        'timestamp',
        'status'
    ];

    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    public function setDrinkId(int $drink_id)
    {
        $this->data['drink_id'] = $drink_id;
    }

    public function getDrinkId()
    {
        return $this->data['drink_id'] ?? null;
    }

    public function setTimeStamp(int $time_stamp)
    {
        $this->data['timestamp'] = $time_stamp;
    }

    public function getTimeStamp()
    {
        return $this->data['timestamp'];
    }

    public function setStatus(string $status)
    {
        $this->data['status'] = $status;
    }

    public function getStatus()
    {
        return $this->data['status'];
    }
}


