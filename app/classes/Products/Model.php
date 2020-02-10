<?php

namespace App\Products;

use \App\App;

class Model {

    private $table_name = 'products';

    public function __construct() {
        App::$db->createTable($this->table_name);
    }

    /**
     * Irašo $item i duombaze
     * @param Product $item
     * @return bool
     */
    public function insert(Product $item) {
        return App::$db->insertRow($this->table_name, $item->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = []) {
        $products = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $products[] = new Product ($row_data);
        }
        
        return $products;
    }

    /**
     * @param Product $item
     * @return bool
     */
    public function update(Product $item) {
        return App::$db->updateRow($this->table_name, $item->getId(), $item->getData());
    }

    /**
     * deletes all items from database
     * @param Product $item
     * @return bool
     */
    public function delete(Product $item) {
        return App::$db->deleteRow($this->table_name, $item->getId());
    }

    public function __destruct() {
        App::$db->save();
    }

}
