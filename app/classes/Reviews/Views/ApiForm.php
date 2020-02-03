<?php

namespace App\Reviews\Views;

class ApiForm extends \Core\Views\Form
{

    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'review' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
    ],
                    'callbacks' => [
                    'success' => 'form_success',
                    'fail' => 'form_fail',
                ]
            ];
    }

}
