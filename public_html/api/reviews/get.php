<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Reviews\Model();

$conditions = $_POST ?? [];

$reviews = $model->get($conditions);
if ($reviews !== false) {
    foreach ($reviews as $review) {
       $review_arr = $review->getData();
       $review_arr['time_stamp'] = date('y-m-d', $review_arr['time_stamp']);
       $response->addData($review_arr);
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();