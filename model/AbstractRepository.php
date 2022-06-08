<?php

include_once ('C:\xampp3\htdocs\Trabalho2\model\RepositoryInterface.php');

abstract class AbstractRepository implements RepositoryInterface
{
    abstract public static function create($model);

    abstract public static function delete($model);

    abstract public static function getList(array $filters);

    abstract public static function read($id);

    abstract public static function update($model);


}