<?php


namespace Core;


class View
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }
///template generuoja html is masyvo !!!  template yra file
/// $data =$this->data kiekviename template yra variablas datathis data galima pasiekti
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

