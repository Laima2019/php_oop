<?php

use \App\Orders\Model;

require '../bootloader.php';

$modelOrders = new \App\Orders\Model();
$orders = $modelOrders->get([]);

$modelDrinks = new \App\Drinks\Model();
$drink = new App\Drinks\Drink();

foreach ($orders as $order){
    $drinks_orders_array [] = [
        'order' => $order,
        'drink' => $modelDrinks->getById($order->getDrinkId())
    ];
}
?>
<body>
<table>
    <tr>
        <th>Gėrimo pavadinimas</th>
        <th>Uzsakymo ID</th>
        <th>Gerimo ID</th>
        <th>Data</th>
        <th>status</th>
    </tr>
        <?php foreach ($drinks_orders_array as $item): ?>
    <tr>
<td><?php print $item['drink']->getName(); ?></td>
<td><?php print $item['order']->getId(); ?></td>
<td><?php print $item['order']->getDrinkId(); ?></td>
<td><?php print $item['order']->getTimestamp(); ?></td>
<?php endforeach; ?>
</tr>

</table>
</body>
