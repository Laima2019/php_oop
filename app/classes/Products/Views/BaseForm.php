<?php

namespace App\Products\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Įveskite pavadinimą',
                    'type' => 'text',
                ],
                'price' => [
                    'label' => 'įveskite kainą',
                    'type' => 'number',
                ],
                'img' => [
                    'label' => 'Įveskite atvaizdą',
                    'type' => 'text',
                ],
                'in_stock' => [
                    'label' => 'Įveskite kiekį',
                    'type' => 'number',
                ],
                'discount' => [
                    'label' => 'Įveskite nuolaidą',
                    'type' => 'number',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }
}


