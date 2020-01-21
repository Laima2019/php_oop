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
$form_delete = [
    'attr' => [
        'action' => 'index.php',
        'class' => 'my-form',
        'id' => 'login_form'
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
    ],
];

$catalog = [
//        ['form' => {Drink Object}
//        'form_delete' => {Form Object}
//]
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
<?php if (App\App::$session->userLoggedIn()): ?>

<?php   print $view['form']->render(); ?>
<?php endif; ?>

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
            <div class="card_price">
                <span><?php print $drink->getPrice() . ""; ?></span>
            </div>
        </div>
        <div class="In_stock_container">
            <div class="card_instock">
            <span> Sandelyje:<?php print $drink->getInStock(); ?></span>
        </div>
            <?php print $item['form_delete']->render(); ?>
        </div>
        <?php endforeach; ?>
</section>
</body>
</html>
