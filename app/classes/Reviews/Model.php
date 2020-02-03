<?php

namespace App\Reviews;

use \App\App;

class Model {

    private $table_name = 'reviews';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Irašo $person i duombaze
     * @param Review $person
     * @return bool
     */
    public function insert(Review $person) {
        return App::$db->insertRow($this->table_name, $person->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $reviews = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $reviews[] = new Review($row_data);
        }
        
        return $reviews;
    }

    /**
     * @param Participant $person
     * @return bool
     */
    public function update(Review $person) {
        return App::$db->updateRow($this->table_name, $person->getId(), $person->getData());
    }

    /**
     * deletes all participants from database
     * @param Participant $person
     * @return bool
     */
    public function delete(Review $person) {
        return App::$db->deleteRow($this->table_name, $person->getId());
    }

    public function __destruct() {
        App::$db->save();
    }

}
