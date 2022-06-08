<?php

interface RepositoryInterface
{
    public static function create($model);

    public static function read($id);

    public static function update($model);

    public static function delete($model);

    public static function getList(array $filters);

}