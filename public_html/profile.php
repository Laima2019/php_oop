<?php

use \App\App;

require '../bootloader.php';

if (!App::$session->userLoggedIn()) {
    header('Location: /login.php');
}

$form = new \App\Users\Views\ProfileForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

function form_success($filtered_input, &$form) {
    $user = App::$session->getUser();

    $user->setName($filtered_input['name']);
    $user->setSurname($filtered_input['surname']);
    $user->setPhone($filtered_input['phone']);
    $user->setCountry($filtered_input['country']);

    if (!empty($filtered_input['password'])) {
        $user->setPassword($filtered_input['password']);
    }


    $model = new \App\Users\Model();
    $model->update($user);

    $form['message'] = 'Duomenys pakeisti sėkmingai!';
}

switch (get_form_action()) {
    case 'submit':
        $filtered_input = get_form_input($form->getData());
        $success = validate_form($filtered_input, $form->getData());
        break;

    default:
        $success = false;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!--    <script defer src="media/js/app.js"></script>-->
</head>
<body>
<!-- Header -->
<header>
    <?php print $navigation->render(); ?>
</header>

<!-- Main Content -->
<main>
    <section class="wrapper">
        <div class="block">
            <h1>Keisti duomenis:</h1>

            <!-- Login Form -->
            <?php print $form->render(); ?>
        </div>
    </section>
</main>

<!-- Footer -->
<footer>
    <?php print $footer->render(); ?>
</footer>
</body>
</html>
