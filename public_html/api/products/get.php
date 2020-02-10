<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();
$product = new \App\Products\Product();

$models = [
    'product' => new \App\Products\Model(),
];

$conditions = $_POST ?? [];

$products = $models['product']->get($conditions);

if ($products !== false) {
    foreach ($products as $product) {
        $product_arr = $product->getData();

        $response->addData($product_arr);
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();