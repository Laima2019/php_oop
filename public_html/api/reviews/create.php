<?php

use App\App;

require '../../../bootloader.php';

// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\Reviews\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

/**
 * If request passes validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_success($filtered_input, $form) {
    $response = new \Core\Api\Response();

    $review = new \App\Reviews\Review();
    $models = [
        'user' => new \App\Users\Model(),
        'review' => new \App\Reviews\Model(),
          ];

    $review->setTimeStamp(time());
    $review->setReview($filtered_input['review']);
    $review->setUserId(\App\App::$session->getUser()->getId());
//sukuriame $id, tam, kad butu atskiru useriu atsiliepimai
    
    $id = $models['review']->insert($review);
    $review->setId($id);

    $review_arr = $review->getData();
    $review_arr['time_stamp'] = date('y-m-d', $review_arr['time_stamp']);

    $user = $models['user']->getById($review_arr['user_id']);
    $review_arr['full_name'] = $user->getName() . ' ' . $user->getSurname();

    unset($review_arr['user_id']);

    $response->setData($review_arr);
    $response->print();
}


/**
 * If request fails validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_fail($filtered_input, $form) {
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}
