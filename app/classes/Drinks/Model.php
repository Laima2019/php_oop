<?php


namespace App\Drinks;


use Core\FileDB;

class Model
{
    private $table_name = 'drinks';
    private $db;

    public function __construct()
    {
        $this->db = New \Core\FileDB(DB_FILE);
        $this->db->createTable($this->table_name);
    }

    public function insert(Drink $drink)
    {
        return $this->db->insertRow($this->table_name, $drink->getData());
    }

    /**
     * Grazina objektu masyva
     * @param $conditions
     * @return array of Drink's
     */
    public function get($conditions)
    {
        $drinks_objects = [];
        $drinks_array = $this->db->getRowsWhere($this->table_name, $conditions);
        foreach ($drinks_array as $drink_id => $drink_array) {

            $drink = new Drink($drink_array);
            $drink->setId($drink_id);

            $drinks_objects[] = $drink;
        }

        return $drinks_objects;
    }

    public function update(Drink $drink)
    {
        return $this->db->updateRow($this->table_name, $drink->getID(), $drink->getData());
    }

    public function delete(Drink $drink){
        return $this->db->deleteRow($this->table_name, $drink->getId());
    }
}