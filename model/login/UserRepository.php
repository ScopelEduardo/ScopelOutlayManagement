<?php

include_once ('C:\xampp3\htdocs\Trabalho2\model\AbstractRepository.php');
include_once ('C:\xampp3\htdocs\Trabalho2\connector\Connector.php');

class UserRepository extends AbstractRepository
{

    public static function create($model)
    {
        /** @var UserModel $model */
        $conn = Connector::getConnector()->getConnection();
        $result = false;
        $username = $model->getUsername();
        $name = $model->getName();
        $lastname = $model->getLastName();
        $password = md5($model->getPassword()); //encryption
        $sql = "INSERT INTO user (username, name, lastname, password) VALUES ('$username', '$name', '$lastname', '$password')";
        try {
            $conn->begin_transaction();
            $result = $conn->query($sql);
            $conn->commit();
        }catch (\Exception $e){
            //todo logger
            $conn->rollback();
        }
        return $result;
    }

    public static function delete($model)
    {
        /** @var UserModel $model */
        $conn = Connector::getConnector()->getConnection();
        $id = $model->getId();
        $sql = "DELETE FROM user WHERE id = '$id'";
        $result = false;
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        return $result;
    }

    public static function getList(array $filters)
    {
        $where = '';
        $first = true;

        foreach ($filters as $filter){
            if (!$first){
                $where .= "AND";
            }
            $field = $filter['field'];
            $value = $filter['value'];
            $operator = $filter['operator'] ?? '=';
            $where .= "$field $operator '$value'";
            $first = false;
        }

        $users = [];

        $conn = Connector::getConnector()->getConnection();
        if ($where){
            $sql = "SELECT * FROM user WHERE $where";
        }else{
            $sql = "SELECT * FROM user";
        }
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new UserModel();
                $user->setData($row);
                $users[] = $user;
            }
        }
        return $users;

    }

    public static function read($id)
    {
        $conn = Connector::getConnector()->getConnection();
        $user = false;
        $sql = "SELECT * FROM user WHERE id = '$id'";
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new UserModel();
                $user->setData($row);
            }
        }
        return $user;
    }

    public static function readByUsername($username){
        $conn = Connector::getConnector()->getConnection();
        $user = false;
        $sql = "SELECT * FROM user WHERE username = '$username'";
        try {
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user = new UserModel();
                    $user->setData($row);
                }
            }
        }catch (\Exception $e){
            //todo logger
        }

        return $user;
    }

    public static function update($model)
    {
        /** @var UserModel $model */
        $lastPassword = self::read($model->getId())->getPassword();
        $conn = Connector::getConnector()->getConnection();
        $result = false;
        $id = $model->getId();
        $username = $model->getUsername();
        $name = $model->getName();
        $lastname = $model->getLastName();
        $password = $model->getPassword();
        if ($password !== $lastPassword){
            $password = md5($model->getPassword()); //encryption
        }
        $sql = "UPDATE user SET username = '$username', name = '$name', lastname = '$lastname', password = '$password' WHERE id = '$id'";
        try {
            $conn->begin_transaction();
            $result = $conn->query($sql);
            $conn->commit();
        }catch (\Exception $e){
            //todo logger
            $conn->rollback();
        }
        return $result;
    }
}