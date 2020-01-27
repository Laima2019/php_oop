<?php


namespace Core\Abstracts;



Abstract class DataHolder
{
    protected $properties;
    protected $data;

    abstract protected function setData(array $data);
    abstract protected function getData();
}