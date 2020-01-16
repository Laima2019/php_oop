<?php

namespace App;

class App

//static db sukuriame tam butu tik vienas duomenu bazes objektas per visa projekta, panaikinama fileDB dublikavima

{
    //This $db property  has common value through all App objects
    public static $db;

    public function __construct()
    {
        // inside class, static variables
        // are accessed with self:: $static_variable_name
        self::$db = New \Core\FileDB(DB_FILE);
    }
}

/*
 * public function __destruct() {
 * self::$db->save;
 * }
 */

