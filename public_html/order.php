<?php

use \App\Orders\Model;

require '../bootloader.php';

$form_delivery_btn = [
    'callbacks' => [
        'success' => 'form_success_delivery',
        'fail' => 'form_fail',
    ],
    'attr' => [
        'method' =>'POST',
            ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
                ],
         ],
    'buttons' => [
        'deliver' => [
            'title' => 'Pristatyti',
            'extra' => [
                'att' => [
                    'class' => 'save-btn',
                ]
            ]
        ]
    ]
];

function form_success_delivery($input, &$form){
    $modelOrders = new \App\Orders\Model();
    $order = $modelOrders->getById($input['id']);
    $order->setStatus('delivered');
    $modelOrders->update($order);
}

$modelOrders = new \App\Orders\Model();
$orders = $modelOrders->get([]);

$view = [];
$view['nav'] = new \App\Views\Navigation();
$view['delivery_form'] = new \App\Views\Form($form_delivery_btn);


$modelDrinks = new \App\Drinks\Model();
$drink = new App\Drinks\Drink();

$drinks_orders_array = [];
foreach ($orders as $order){
//    var_dump($order->getDrinkId());
   $form_delivery_btn['fields']['id']['value'] = $order->getId();

//    var_dump($drink);
    $drinks_orders_array [] = [
        'order' => $order,
        'drink' => $modelDrinks->getById($order->getDrinkId()),
        'delivery_form'=> new \App\Views\Form($form_delivery_btn),
    ];
}
if(!empty($_POST)){
    $input = get_form_input($form_delivery_btn);
    $success = validate_form($input, $form_delivery_btn);
}

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
<table>
    <tr>
        <th>Gėrimo pavadinimas</th>
        <th>Uzsakymo ID</th>
        <th>Gerimo ID</th>
        <th>Data</th>
        <th>status</th>
        <th>veiksmai</th>

    </tr>
        <?php foreach ($drinks_orders_array as $item): ?>
    <tr>
<td><?php print ($item['drink']) ? $item['drink']->getName() : '-'; ?></td>
<td><?php print $item['order']->getId(); ?></td>
<td><?php print $item['order']->getDrinkId(); ?></td>
<td><?php print $item['order']->getTimestamp(); ?></td>
<td><?php print $item['order']->getStatus(); ?></td>
<td><?php print $item['delivery_form']->render(); ?></td>
       <?php endforeach; ?>
    </tr>


</table>
</body>
</html>