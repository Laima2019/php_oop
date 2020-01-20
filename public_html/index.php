<?php

use App\Drinks\Model;

require '../bootloader.php';

$form = [
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
        ]
    ],
    'buttons' => [
        'save' => [
            'title' => 'Sukurti',
            'extra' => [
                'att' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ],
];

function form_success($input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new\App\Drinks\Drink($input);

    $modelDrinks->insert($drink);
}


function form_fail(&$form, $input)
{
    $form['message'] = 'form fail';
}

if (!empty($_POST)) {
    $input = get_form_input($form);
    $success = validate_form($input, $form);
} else {
    $success = false;
}

$modelDrinks = new App\Drinks\Model();
$drinks = $modelDrinks->get([]);

$view = [];
$view['form'] = new \App\Views\Form($form);
$view['nav'] = new\App\Views\Navigation();
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
<?php print $view['form']->render(); ?>

<section class="container">
    <?php foreach ($drinks as $drink): ?>
        <div class="drink_container">
            <div class="card_name">
                <span><?php print $drink->getName(); ?></span>
            </div>
            <div class="card_abarot">
                <span><?php print $drink->getAbarot(); ?></span>
            </div>
            <div class="card_amount">
                <span><?php print $drink->getAmount(); ?></span>
            </div>
            <div class="card_image">
                <img src="<?php print $drink->getImage(); ?>">
            </div>
        </div>
    <?php endforeach; ?>
</section>
</body>
</html>
