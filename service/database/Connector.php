<?php

class Connector
{

    /**
     * @var mysqli|null
     */
    private $_connection;

    public function __construct(
        $dbUsername = 'root',
        $dbPassword = '',
        $dbName = 'scopeloutlaymanagement',
        $server = 'localhost'
    ){
        try{
            if ($this->_connection === null){
                $this->_connection = new mysqli($server, $dbUsername, $dbPassword, $dbName);
                if ($this->_connection->connect_error) {
                    $this->_connection = null;
                    throw new \Exception("Nao foi possivel se conectar a base de dados.");
                }
            }
        }catch (\Exception $e){
            //todo logger
        }

    }

    /**
     * @return mysqli|null
     */
    public function getConnection()
    {
        return $this->_connection;
    }



}