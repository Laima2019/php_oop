<?php

require '../bootloader.php';

//// I uzduotis
//$sandwich = [
//    'price' => 2,
//    'size' => 'XL'
//];
//
//$table_name = 'sumustiniai';
//
////sukuriame objekta kuris valdys musu duombaze db.txt
//$file_Db = new \Core\FileDB(DB_FILE);
//$file_Db->createTable($table_name);
//$file_Db->insertRow($table_name, $sandwich);
//$file_Db->save();
//
////var_dump($file_Db);
//
//// II uzduotis
//
////$creds = [
////    [
////        'username' => 'alius',
////        'password' => 'meskutis'
////    ],
////    [
////        'username' => 'lukas',
////        'password' => 'mcburgeris'
////    ],
////];
////// table name nurodo kokia bus lentele duomenu bazeje
////$table_name = 'users';
////$user = new User($creds);
////$file_Db->createTable($table_name);
////// arba galima taip irasyti
//////$file_Db->createTable('users');
////$file_Db->insertRow($table_name, $creds[0]);
////$file_Db->insertRow($table_name, $creds[1]);
////$file_Db->save();
//
//// III uzduotis
//// siuo zemiau esanciu kodu ieskome password meskutis duomenu bazeje useriu lenteleje
////$file_Db->getRowsWhere('users', ['password' => 'meskutis']);
//
//// IV uzduotis
////$drink = new Drink();
////$drink->setData([
////    'name' => 'Vodka',
////    'abarot' => 40,
////    'amount' => 5
////]);
//
//// V uzduotis class drink yra vienas gerimas, ir ji galima uzpildyti pavadinimu, img
////var_dump($drink1);
//$drink2 = new \App\Drinks();
//$drink2->setData([
//    'name' => 'svyturys',
//    'abarot' => 7.2,
//    'amount' => 5,
//    'image' => 'http://www.google.com/url?image'
//]);
////var_dump($drink2);
//var_dump($drink2->getData());
//
////VII sukurta drink objekta su fileDB irasyti ji faila(table drink)
//$drink3 = new \App\Drinks\Drink([
//        'name' =>'absenth',
//        'amount_ml'=> 700,
//        'abarot' => 60,
//        'image' => 'http://....'
//]);
////$file_Db = new FileDB(DB_FILE);
//$file_Db->createTable('drinks');
//$file_Db->insertRow('drinks', $drink3->getData());
//$file_Db->save();


//$drink = New App\Drinks\Drink([
//        'name' => 'Svoboda',
//        'abarot' => 55,
//        'amount' => 700,
//        'image' => '/media/images',
//]);
//$modelDrinks = New App\Drinks\Model();
//$modelDrinks->insert($drink);
//
//$drinks = $modelDrinks->get(['name' => 'Svoboda']);
//
//foreach ($drinks as $drink) {
//    $drink->setName('Absinth');
//    var_dump($drink);
//    $modelDrinks->update($drink);
//}
//
//$drinksAll = $modelDrinks->get([]);
//var_dump("Drinks all", $drinksAll);
//
//i duomenu baze itraukti 4 gerimus ir HTML ispausdinti
$drink1 = New App\Drinks\Drink(
    [
    'name' => 'craft',
    'abarot' => 3.8,
    'amount' => 500,
    'image' => 'https://www.assorti.lt/cache/images/02df30b4e48356b3bfa4e0300c51dfb5.jpg',
    ]);
$drink2 = New App\Drinks\Drink(
    [
    'name' => 'Somersby',
    'abarot' => 2.5,
    'amount' => 350,
    'image' => 'https://www.barbora.lt/api/Images/GetInventoryImage?id=6db3dbec-7eab-4089-8cfa-e3ff834199d2',
    ]);
$drink3 = New App\Drinks\Drink(
    [
    'name' => 'Pils',
    'abarot' => 5.6,
    'amount' => 450,
    'image' => 'https://products2.imgix.drizly.com/ci-pilsner-urquell-68942c4af233c846.jpeg?auto=format%2Ccompress&fm=jpeg&q=20',
    ]);
$drink4 = New App\Drinks\Drink(
    [
        'name' => 'Horse Piss',
        'abarot' => 0.5,
        'amount' => 350,
        'image' => 'https://cdn.beeradvocate.com/im/beers/29204.jpg',
    ]);
$modelDrinks = new App\Drinks\Model();
$modelDrinks->insert($drink1);
$modelDrinks->insert($drink2);
$modelDrinks->insert($drink3);
$modelDrinks->insert($drink4);

$drinks = $modelDrinks->get([]);
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
<section class="container">
    <?php foreach ($drinks as $drink): ?>
        <div class="drink_container">
            <div class="card">
            <span><?php print $drink->getName(); ?></span>
            <span><?php print $drink->getAbarot(); ?></span>
            <span><?php print $drink->getAmount(); ?></span>
            </div>
            <img src="<?php print $drink->getImage(); ?>">
        </div>
    <?php endforeach; ?>

</section>
</body>
</html>
