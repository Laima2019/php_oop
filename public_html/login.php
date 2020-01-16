<?php

use App\Users\Model;

require '../bootloader.php';

if (isset($_SESSION['email'])){
    header('location:/index.php');
}

$form = [
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'class' => 'my-form',
        'action' => 'login.php',
        'method' => 'POST'
    ],
    'fields' => [
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
            'title' => 'Login',
            'extra' => [
                'att' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ],
];

function form_success($input, &$form){
    $_SESSION['email'] = $input ['email'];
    $_SESSION['password'] = $input ['password'];

        header ('Location:/index.php');
}

function form_fail($input, &$form) {
    $form['message'] = 'Nepavyko';
}

if (!empty($_POST)) {
    $input = get_form_input($form);
    $success = validate_form($input, $form);
} else {
    $success = false;
}
$show_form = !$success;

$view = new \Core\View($form);


?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div class="login-form">
    <?php if ($show_form): ?>
    <?php print $view->render(ROOT . '/core/templates/form/form.tpl.php'); ?>
    <?php endif; ?>
</div>
</body>
</html>
