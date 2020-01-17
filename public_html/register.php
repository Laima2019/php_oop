<?php

use App\Users\Model;

require '../bootloader.php';

$form = [
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'class' => 'my-form',
        'action' => 'register.php',
        'method' => 'POST'
    ],
    'fields' => [
        'name' => [
            'filter' =>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'label' => 'Name',
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: įveskite savo vardą',
                ],
                'validators' => [
                    'validate_not_empty',
                ]
            ]
        ],
        'email' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'label' => 'eMail',
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: įveskite e-paštą',
                ],
                'validators' => [
                    'validate_not_empty',

                ]
            ]
        ],
        'password' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'label' => 'password',
            'type' => 'password',
            'extra' => [
                'attr' => [
                    'placeholder' => 'pvz: įveskite slaptažodį',
                    'step' => '0.1'
                ],
                'validators' => [
                    'validate_not_empty',
                    //'validate_is_number'
                ]
            ],
        ],
    ],
    'buttons' => [
        'save' => [
            'title' => 'Register',
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
    $modelUsers = new App\Users\Model();
//    var_dump($input);
    $user = new\App\Users\User($input);
    $modelUsers->insert($user);
    $form['message'] = 'Registration successfull';
}

function form_fail(&$form, $input)
{
    $form['message'] = 'register fail';
}

if (!empty($_POST)) {
    $input = get_form_input($form);
    $success = validate_form($input, $form);
} else {
    $success = false;
}

$modelUsers = new App\Users\Model();
$users = $modelUsers->get([]);

$view = [];
$view['form'] = new \App\Views\Form($form);
//$view['nav'] = new\App\Views\Navigation($data);
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <title>User</title>
</head>
<body>
<?php print $view['form']->render(); ?>

<section class="container">
    <?php foreach ($users as $user): ?>
<!--        <div class="card_container">-->
<!--            <div class="card-name">-->
<!--                <span>--><?php //print $user->getName(); ?><!--</span>-->
<!--            </div>-->
<!--            <div class="card-email">-->
<!--                <span>--><?php //print $user->getEmail(); ?><!--</span>-->
<!--            </div>-->
<!--            <div class="card-password">-->
<!--                <span>--><?php //print $user->getPassword(); ?><!--</span>-->
<!--            </div>-->
<!--        </div>-->
    <?php endforeach; ?>
</section>
</body>
</html>