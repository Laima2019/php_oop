<?php
require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Geeks\Model();

$conditions = $_POST ?? [];

$geeks = $model->get($conditions);
if ($geeks !== false) {
    foreach ($geeks as $person) {
        $response->addData($person->getData());
    }
} else {
    $response->addError('Could not pull data from database!');
}

