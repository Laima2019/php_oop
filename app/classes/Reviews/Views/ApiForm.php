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
                'rate' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_number',
                            'validate_ranking'
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
