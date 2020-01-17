<?php


namespace App\Views;


class Navigation extends \Core\View
{
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    // render //atvaizduoja html
    public function render($template_path = ROOT . '/core/templates/navigation.tpl.php')
    {
        return parent::render($template_path);
    }
}