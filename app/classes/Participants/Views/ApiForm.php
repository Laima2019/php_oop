<?php

namespace App\Participants\Views;

class ApiForm extends \Core\Views\Form
{

    public function __construct($data = [])
    {
        $this->data = [
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ],
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'surname' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'city' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
            ]
        ];
    }

}
