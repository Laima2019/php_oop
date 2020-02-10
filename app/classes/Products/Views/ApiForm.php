<?php

namespace App\Products\Views;

class ApiForm extends \Core\Views\Form
{

    public function __construct($data = [])
    {
        $this->data = [
            'fields' => [
                'name' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'img' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',

                        ]
                    ]
                ],
                'price' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',

                        ]
                    ]
                ],
                'in_stock' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',

                        ]
                    ]
                ],
                'discount' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',

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
