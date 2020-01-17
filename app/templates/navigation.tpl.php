<?php

$data =[
    'left' => [
        ['title' => 'Home', 'url' =>'/index.php']
    ],
    'right' => [
        ['title' => 'Login', 'url' => '/login.php'],
        ['title' => 'Register', 'url' => '/register.php'],
        ['title' => 'Logout', 'url' => '/logout.php'],

    ],
];

//var_dump($data);
?>

<nav class="nav">
    <div class="left">
        <?php foreach ($data['left'] as $link) :?>
        <a href="<?php print $link['url']; ?>"><?php print $link['title']; ?> </a>
    <?php endforeach;?>
    </div>
    <div class="right">
        <?php foreach ($data['right'] as $link) :?>
            <a href="<?php print $link['url']; ?>"><?php print $link['title']; ?> </a>
        <?php endforeach;?>
    </div>
</nav>
