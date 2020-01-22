<?php

use App\Drinks\Model;

require '../bootloader.php';

$form_create = [
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST'
    ],
    'fields' => [
        'name' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'label' => 'Pavadinimas',
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: Absolut',
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ]
        ],
        'amount' => [
            'label' => 'kiekis',
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: 500',
                ],
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number'
                ]
            ]
        ],
        'abarot' => [
            'label' => 'abarot',
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: 4.4',
                    'step' => '0.1'
                ],
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number'
                ]
            ],
        ],
        'image' => [
            'label' => 'nuotraukos (url)',
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: http://..',
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ]
        ],
        'price' => [
            'label' => 'price',
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: 4.4',
                    'step' => '0.1'
                ],
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number'
                ]
            ],
        ],
        'in_stock' => [
            'label' => 'in_stock',
            'type' => 'number',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: 4',
                    'step' => '0.1'
                ],
                'validators' => [
                    'validate_not_empty',
                    'validate_is_number'
                ]
            ],
        ],
    ],
    'buttons' => [
        'create' => [
            'title' => 'Sukurti',
            'extra' => [
                'att' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ],
];
$form_delete = [
    'callbacks' => [
        'success' => 'form_success_delete',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'action' => 'index.php',
        'class' => 'my-form',
        'id' => 'login_form'
    ],
    'fields' => [
        'id' => [
//            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'label' => 'Pavadinimas',
            'type' => 'text',
            'value' => null,
            'extra' => [
                'attr' => [
                    'id' => 'name',
                    'placeholder' => 'pvz: ID',
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ]
        ],
    ],
    'buttons' => [
        'delete' => [
            'title' => 'Ištrinti',
            'extra' => [
                'att' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];


function form_success_create($input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new\App\Drinks\Drink($input);

    $modelDrinks->insert($drink);
}

function form_success_delete($input, &$form)
{

    $modelDrinks = new App\Drinks\Model();
    $drink = new\App\Drinks\Drink($input);

    $modelDrinks->delete($drink);
}

function form_fail(&$form, $input)
{
    $form['message'] = 'form fail';
}

//if (!empty($_POST)) {
//    if (get_form_action() == 'create'){
//    $input = get_form_input($form_create);
//
//    $success = validate_form($input, $form_create);
//}
//    elseif (get_form_action() == 'delete'){
//    $input = get_form_input($form_delete);
//
//    $success = validate_form($input, $form_delete);
//}
//    else {
//    $success = false;
//    }
//}
if(!empty($_POST)) {
    switch (get_form_action()){
        case 'delete':
            $input = get_form_input($form_delete);
            $success = validate_form($input, $form_delete);
            break;
        case 'create':
            $input = get_form_input($form_create);
            $success = validate_form($input, $form_create);
            break;
    }
    $success = false;
}
$modelDrinks = new \App\Drinks\Model();
$drinks = $modelDrinks->get([]);

$catalog = [];

foreach ($drinks as $drink) {
    $form_delete['fields']['id']['value'] = $drink->getId();
    $catalog[] = [
        'dataholder' => $drink,
        'form_delete' => new \App\Views\Form($form_delete)
    ];
}

$view = [];
$view['form'] = new \App\Views\Form($form_create);
$view['nav'] = new \App\Views\Navigation();
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <title>OOP</title>
</head>
<body>

<?php print $view['nav']->render(); ?>
<?php if (App\App::$session->userLoggedIn()): ?>

    <?php print $view['form']->render(); ?>
<?php endif; ?>

<section class="flex">
    <?php foreach ($catalog as $item): ?>
        <div class="flex_container">
            <div class="flex_card">
                <img src="<?php print $item['dataholder']->getImage(); ?>">
            <div class="flex_name">
                <div><?php print $item['dataholder']->getName(); ?></div>
                <?php print $item['dataholder']->getAmount(); ?>
                <?php print $item['dataholder']->getAbarot(); ?>
            </div>
            <div class="position_abs">
                <?php print $item['dataholder']->getPrice() . ""; ?>
            </div>
            <div class="drink_card">
                    Sandelyje:<?php print $item['dataholder']->getInStock(); ?>
                </div>
                <div>
                <?php print $item['form_delete']->render(); ?>
            </div>
        </div>

    <?php endforeach; ?>
</section>
</body>
</html>
