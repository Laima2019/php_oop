<?php


namespace Core;


class View
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function render($template_path)
    {
        if (!file_exists($template_path)) {
            throw (new\Exception('Template with filename' . '$template_path does not exists !'));
        }
        $data = $this->data;

        ob_start();

        require $template_path;
//return
        return ob_get_clean();
    }
}

