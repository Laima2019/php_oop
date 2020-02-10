<?php

namespace App\Products;

class Product {

    private $data = [];

    public function __construct($data = null) {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'in_stock'=> null,
                'price' => null,
                'img' => null,
                'discount' => null,
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
        $this->setPrice($array['price'] ?? null);
        $this->setImg($array['img'] ?? null);
        $this->setInStock($array['in_stock'] ?? null);
        $this->setDiscount($array['discount'] ?? null);

    }

    /**
     * Gets all data as array
     * @return array
     */
    public function getData() {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'img' => $this->getImg(),
            'price' => $this->getPrice(),
            'in_stock' => $this->getInStock(),
            'discount' => $this->getDiscount(),


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
     * @param float $price
     */
    public function setPrice(float $price) {
        $this->data['price'] = $price;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->data['price'];
    }

    /**
     * Sets data img
     * @param string img url yra kaip tekstas $img
     */
    public function setImg(string $img) {
        $this->data['img'] = $img;
    }

    /**
     * @return mixed
     */
    public function getImg() {
        return $this->data['img'];
    }
    /**
     * Sets data in_stock
     * @param integer yra sveikas skaičius be kablelio $in_stock
     */
    public function setInStock(int $in_stock) {
    $this->data['in_stock'] = $in_stock;
}

    /**
     * @return mixed
     */
    public function getInStock() {
        return $this->data['in_stock'];
    }
    public function setDiscount(int $discount) {
        $this->data['discount'] = $discount;
    }

    /**
     * @return mixed
     */
    public function getDiscount() {
        return $this->data['discount'];
    }
}
