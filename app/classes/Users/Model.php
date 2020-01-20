<?php


namespace App\Users;

use App\App;

// Su Model klase, mes galime įrašyti/atnaujinti/ištrinti į duombazę User dataholderius
// Taip pat, nurodę kondicijas, galime gauti (pagal informaciją duombazėje) User dataholderių masyvą
// musm reikia tokio tools su kuriuo galima todel sukuria new model pxv sesion klaseje
class Model
{
    private $table_name = 'Users';
    private $db;

    public function __construct()
    {
        App::$db->createTable($this->table_name);
    }
    public function insert(User $user)
    {
        return App::$db->insertRow($this->table_name, $user->getData());
    }
// funkcija get istraukiame duomenis condition yra checkina email  ir pasword su duomenu bazeje esanciu user masyvu ir jeigu atitinka
//
    public function get($conditions)
    {
        $users_objects = [];
        $users_array = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($users_array as $user_id => $user_array) {

            $user = new User($user_array);
            $user->setId($user_id);

            $users_objects[] = $user;
        }

        return $users_objects;
    }

    public function update(User $user)
    {
        return App::$db->updateRow($this->table_name, $user->getID(), $user->getData());
    }
    public function delete(User $user){
        return App::$db->deleteRow($this->table_name, $user->getId());
    }
}