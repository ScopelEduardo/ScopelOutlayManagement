<?php

abstract class AbstractView implements ViewInterface
{
    abstract public static function execute($params);

}