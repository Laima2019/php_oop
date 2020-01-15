<?php


class App
{
    //This $db property  has common value through all App objects
    public static $db;

    public function __construct()
    {
        // inside class, static variables
        // are accessed with self:: $static_variable_name
        //self::$db = New \Core\FileDB(DB_FILE);
    }
}

/*
 * public function __destruct() {
 * self::$db->save;
 * }
 */

