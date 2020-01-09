<?php

require '../bootloader.php';

require ROOT. '/core/classes/FileDB.php';
require ROOT. '/app/classes/User.php';



$creds = ['Aurimas', 'psw'];
$user1 = new User($creds);
var_dump($user1);

$fileDb = new \core\FileDB(DB_FILE);
$fileDb->load();

$users = $fileDb->getData();
$users[] = $user1->getCredentials();

$fileDb->setData($users);
$fileDb->save();
var_dump($fileDb);

//objekto sukurimas = new File, ir visos klases sudejimas i si variabla $file_db
$file_db = new \Core\FileDB(DB_FILE);

$file_db->getData();
//paduodame set data , o lauztiniai skliaustai todel, kad turi buti  arejus
$file_db->setData(['array']);

// i save nereikia nieko paduoti, nes prie function save() nebuvo jokiu parametru ()
$file_db->save();
$file_db->load();

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
		<h1>Darome HIP, darome OOP</h1>
    </body>
</html>
