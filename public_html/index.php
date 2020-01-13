<?php

require '../bootloader.php';

require ROOT . '/core/classes/FileDB.php';
require ROOT . '/app/classes/User.php';
require ROOT . '/app/classes/Drink/Drink.php    ';

// I uzduotis
$sandwich = [
    'price' => 2,
    'size' => 'XL'
];

$table_name = 'sumustiniai';

//sukuriame objekta kuris valdys musu duombaze db.txt
$file_Db = new \Core\FileDB(DB_FILE);
$file_Db->createTable($table_name);
$file_Db->insertRow($table_name, $sandwich);
$file_Db->save();

//var_dump($file_Db);

// II uzduotis

$creds = [
    [
        'username' => 'alius',
        'password' => 'meskutis'
    ],
    [
        'username' => 'lukas',
        'password' => 'mcburgeris'
    ],
];
// table name nurodo kokia bus lentele duomenu bazeje
$table_name = 'users';
$user = new User($creds);
$file_Db->createTable($table_name);
// arba galima taip irasyti
//$file_Db->createTable('users');
$file_Db->insertRow($table_name, $creds[0]);
$file_Db->insertRow($table_name, $creds[1]);
$file_Db->save();

// III uzduotis
// siuo zemiau esanciu kodu ieskome password meskutis duomenu bazeje useriu lenteleje
$file_Db->getRowsWhere('users', ['password' => 'meskutis']);

// IV uzduotis
//$drink = new Drink();
//$drink->setData([
//    'name' => 'Vodka',
//    'abarot' => 40,
//    'amount' => 5
//]);

// V uzduotis class drink yra vienas gerimas, ir ji galima uzpildyti pavadinimu, img

$drink1 = new Drink();

$drink1->setName('CocaCola');
//var_dump($drink1);
$drink2 = new Drink();
$drink2->setData([
    'name' => 'svyturys',
    'abarot' => 7.2,
    'amount' => 5,
    'image' => 'img'
]);
//var_dump($drink2);
var_dump($drink2->getData());
var_dump($drink2->getData());
var_dump($drink1->setName('Cola')->setAmount(3)->setAbarot(24));

?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <title>OOP</title>
</head>
<body>
<h1>Darome OOP</h1>
</body>
</html>
