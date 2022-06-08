<?php

include_once ('C:\xampp3\htdocs\Trabalho2\model\ModelInterface.php');

abstract class AbstractModel implements ModelInterface
{
    abstract public function getData();

    abstract public function setData(array $params);
}