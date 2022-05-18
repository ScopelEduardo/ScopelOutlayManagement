<?php

namespace ScopelOutlayManagement\model\repository;

include ("../service/database/Connector.php");
include ("../model/user/User.php");

use mysqli_result;
use ScopelOutlayManagement\service\connector\Connector;
use ScopelOutlayManagement\model\User;

class UserRepository
{
    /**
     * @var Connector
     */
    private $_dbConnection;

    /**
     * UserRepository Constructor
     */
    public function __construct()
    {
        $this->_dbConnection = new Connector();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create($user){
        $conn = $this->_dbConnection->getConnection();
        $result = false;
        $username = $user->getUsername();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $password = md5($user->getPassword()); //encryption
        $sql = "INSERT INTO outlay_user (username, firstname, lastname, password) VALUES ('$username', '$firstname', '$lastname', '$password')";
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

    /**
     * @param $userId
     * @return false|User
     */
    public function readById($userId){
        $conn = $this->_dbConnection->getConnection();
        $user = false;
        $sql = "SELECT * FROM outlay_user WHERE user_id = $userId";
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->setUserId($row["user_id"]);
                $user->setUsername($row["username"]);
                $user->setFirstname($row["firstname"]);
                $user->setLastname($row["lastname"]);
                $user->setPassword($row["password"]);
                $user->setCreatedAt($row["created_at"]);
                $user->setUpdatedAt($row["updated_at"]);
                $user->setAdditionalInfo($row["additional_info"]);
            }
        }
        return $user;
    }

    /**
     * @param $username
     * @return false|User
     */
    public function readByUsername($username){
        $conn = $this->_dbConnection->getConnection();
        $user = false;
        $sql = "SELECT * FROM outlay_user WHERE username = '$username'";
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->setUserId($row["user_id"]);
                $user->setUsername($row["username"]);
                $user->setFirstname($row["firstname"]);
                $user->setLastname($row["lastname"]);
                $user->setPassword($row["password"]);
                $user->setCreatedAt($row["created_at"]);
                $user->setUpdatedAt($row["updated_at"]);
                $user->setAdditionalInfo($row["additional_info"]);
            }
        }
        return $user;
    }

    /**
     * @param User $user
     * @return bool|mysqli_result
     */
    public function update($user){
        $conn = $this->_dbConnection->getConnection();
        $result = false;
        $userId = $user->getUserId();
        $username = $user->getUsername();
        $firstname = $user->getFirstname();
        $lastname = $user->getLastname();
        $password = md5($user->getPassword()); //encryption
        $additionalInfo = $user->getAdditionalInfo();
        $sql = "UPDATE outlay_user SET username = $username, firstname = $firstname, lastname = $lastname, password = $password, additional_info = $additionalInfo WHERE user_id = $userId";
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

    /**
     * @param int $userId
     * @return bool
     */
    public function delete($userId){
        $conn = $this->_dbConnection->getConnection();
        $sql = "DELETE FROM outlay_user WHERE user_id = $userId";
        try {
            $result = $conn->query($sql);
        }catch (\Exception $e){
            //todo logger
        }
        return $result;
    }

    public function getList($filters = []){
        //todo getList
    }
}