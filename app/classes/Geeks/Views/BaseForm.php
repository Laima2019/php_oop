<?php


namespace App\Geeks\Views;


class BaseForm extends \Core\Views\Form
{
    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                ],
                'surname' => [
                    'label' => 'Pavardė',
                    'type' => 'text',
                ],
                'level' => [
                    'label' => 'Lygis',
                    'type' => 'number',
                ],
                'attendance' => [
                    'label' => 'Lankomumas',
                    'type' => 'number',
                ],
                'score' => [
                    'label' => 'Balas',
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