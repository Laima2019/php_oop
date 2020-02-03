<?php


namespace App\Geeks;


use App\App;


class Model
{
    private $table_name = 'geeks';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Irašo $person i duombaze
     * @param Geeks $person
     * @return bool
     */
    public function insert(Geek $person) {
        return App::$db->insertRow($this->table_name, $person->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $geeks = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $geeks[] = new Geek($row_data);
        }

        return $geeks;
    }

    /**
     * @param Geek $person
     * @return bool
     */
    public function update(Geek $person) {
        return App::$db->updateRow($this->table_name, $person->getId(), $person->getData());
    }

    /**
     * deletes all participants from database
     * @param Geek $person
     * @return bool
     */
    public function delete(Geek $person) {
        return App::$db->deleteRow($this->table_name, $person->getId());
    }

    public function __destruct() {
        App::$db->save();
    }

}