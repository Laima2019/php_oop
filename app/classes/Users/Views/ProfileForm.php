<?php


namespace App\Users\Views;


use App\App;

class ProfileForm extends \Core\Views\Form
{
    public function __construct($data = [])
    {
        $user = App::$session->getUser();

        $this->data = [
            'attr' => [
                'id' => 'profile-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'value' => $user->getName(),
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_space',
                        ]
                    ],
                ],
                'surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'value' => $user->getSurname(),
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_no_space',
                        ]
                    ],
                ],
                'phone' => [
                    'label' => 'Phone',
                    'type' => 'text',
                    'value' => $user->getPhone(),
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_phone_number',
                        ]
                    ],
                ],
                'country' => [
                    'label' => 'Country',
                    'type' => 'select',
                    'value' => $user->getCountry(),
                    'options' => [
                        'Antarktida',
                        'Europa',
                        'Asia',
                        'Afrika',

                    ],
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                        ],
                        'placeholder' => 'pasirinkite šalį'

                    ],
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
//                    'value' => $user->getPassword(),
                    'extra' => [
                        'validators' => [
                        ]
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Password repeat',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Pakeisti',
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }
}