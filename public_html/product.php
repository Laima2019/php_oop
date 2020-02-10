<?php
require '../bootloader.php';

use App\App;

$createForm = new \App\Products\Views\CreateForm();
$updateForm = new \App\Products\Views\UpdateForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Užsakymai</title>
    <link rel="stylesheet" href="media/css/normalize.css">
    <link rel="stylesheet" href="media/css/milligram.min.css">
    <link rel="stylesheet" href="media/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <?php print $navigation->render(); ?>
</header>

<main>
    <section class="wrapper">
        <?php if (App::$session->userLoggedIn()): ?>
            <div class="block" id="review-form">
                <h2>Įveskite produktą:</h2>
                <?php print $createForm->render(); ?>
            </div>
        <?php endif; ?>
        <div class="block">
            <div id="product-table">
            </div>
        </div>
    </section>

    <!-- Update Modal -->
    <div id="update-modal" class="modal">
        <div class="wrapper">
            <span class="close">&times;</span>
            <?php print $updateForm->render(); ?>
        </div>
    </div>
</main>

<!-- Footer -->
<footer>
    <?php print $footer->render(); ?>
</footer>

<script defer src="media/js/products.js"></script>
</body>
</html>
