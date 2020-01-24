<?php


namespace App\Drinks;

use App\App;

// Model yra tarpininkas tarp duombazes (t.y. iraso objektus i duombaze ir  grazins objektus)
class Model
{
    private $table_name = 'drinks';
    private $db;

    public function __construct()
    {
        //use Core\FileDB;
//        $this->db = New \Core\FileDB(DB_FILE);
//        $this->db->createTable($this->table_name);
//        var_dump(App::$db);
        App::$db->createTable($this->table_name);
    }

    public function insert(Drink $drink)
    {
        return App::$db->insertRow($this->table_name, $drink->getData());
    }

    /**
     * Grazina objektu masyva
     * @param $conditions
     * @return array of Drink's
     */
    public function get($conditions)
    {
        $drinks_objects = [];
        $drinks_array = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($drinks_array as $drink_id => $drink_array) {

            $drink = new Drink($drink_array);
            $drink->setId($drink_id);

            $drinks_objects[] = $drink;
        }

        return $drinks_objects;
    }

    // getById grazina objekta is eilutes duomenu
    public function getById($id)
    {
        // get row atiduoda vieno drink'o areju
        $drink_data = App::$db->getRow($this->table_name, $id);
//            var_dump($drink_data, $id);
        // is to grazinto vieno arejaus sukuriamas new drink objektas//
        if ($drink_data) {
            $drink = new Drink($drink_data);
            $drink->setId($id);
            return $drink;
        }

        return null;
    }

    public function update(Drink $drink)
    {
        return App::$db->updateRow($this->table_name, $drink->getID(), $drink->getData());
    }

    public function delete(Drink $drink)
    {
        return App::$db->deleteRow($this->table_name, $drink->getId());
    }
}