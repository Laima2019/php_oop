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
$form = (new \App\Products\Views\ApiForm())->getData();
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

    $product = new \App\Products\Product($filtered_input);

    $models = [
        'product' => new \App\Products\Model(),
      ];
    //kiekvienas naujai sukurtas produktas turi savo ID,

    $id = $models['product']->insert($product);

    $product->setId($id);

    // getData paima duomenis is dataholderio   public function getData() {
    //        return [
    //            'id' => $this->getId(),
    //            'name' => $this->getName(),
    $response_data = $product->getData();

    $response->setData($response_data);
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
