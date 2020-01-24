<?php


namespace App\Orders;

use App\App;
// Model yra tarpininkas tarp duombazes
class Model
{
    private $table_name = 'orders';
    private $db;

    public function __construct()
    {

        App::$db->createTable($this->table_name);
    }

    public function insert(Order $order)
    {
        return App::$db->insertRow($this->table_name, $order->getData());
    }

    /**
     * Grazina objektu masyva
     * @param $conditions
     * @return array of Drink's
     */
    public function get($conditions)
    {
        $orders_objects = [];
        $orders_array = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($orders_array as $order_id => $order_array) {

            $order = new Order($order_array);
            $order->setId($order_id);

            $orders_objects[] = $order;
        }

        return $orders_objects;
    }

    public function update(Order $order)
    {
        return App::$db->updateRow($this->table_name, $order->getID(), $order->getData());
    }

    public function delete(Order $order)
    {
        return App::$db->deleteRow($this->table_name, $order->getId());
    }
}