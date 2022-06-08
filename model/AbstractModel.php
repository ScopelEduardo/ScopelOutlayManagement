<?php

abstract class AbstractModel implements ModelInterface
{
    abstract public function getData();

    abstract public function setData(array $params);
}