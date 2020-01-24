<?php

require '../bootloader.php';

$form_edit = [
    'callbacks' => [
        'success' => 'form_success_edit',
        'fail' => 'form_fail',
    ],
    'attr' => [
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
        'edit' => [
            'title' => 'Redaguoti',
            'extra' => [
                'att' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ],
];

$modelDrinks= new \App\Drinks\Model();

if (isset($_GET['id'])) {
    $drink = $modelDrinks->getById($_GET['id']);
} else {
    header('Location: index.php');
}

function form_success_edit($input, &$form)
{
    $modelDrinks = new App\Drinks\Model();
    $drink = new\App\Drinks\Drink($input);
    $drink->setId($_GET['id']);

    $modelDrinks->update($drink);
}

function form_fail(&$form, $input)
{
    $form['message'] = 'form fail';
}


if (!empty($_POST)) {
    $input = get_form_input($form_edit);
    $success = validate_form($input, $form_edit);
} else {
    $success = false;
}

//\App\App::$session->userLoggedIn();


$form_edit['fields']['name']['value'] = $drink->getName();
$form_edit['fields']['amount']['value'] = $drink->getAmount();
$form_edit['fields']['abarot']['value'] = $drink->getAbarot();
$form_edit['fields']['image']['value'] = $drink->getImage();
$form_edit['fields']['price']['value'] = $drink->getPrice();
$form_edit['fields']['price']['value'] = $drink->getInStock();

$view = [];
$view['form'] = new \App\Views\Form($form_edit);
$view['nav'] = new \App\Views\Navigation();
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <title>Document</title>
</head>
<body>
<?php print $view['form']->render(); ?>
</body>
</html>