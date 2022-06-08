<?php

class Connector
{
    /**
     * @var mysqli|null
     */
    private $_connection;
    private static $_connectorInstance;

    /**
     * @param $dbUsername
     * @param $dbPassword
     * @param $dbName
     * @param $server
     */
    private function __construct(
        $dbUsername = 'root',
        $dbPassword = '',
        $dbName = 'financas',
        $server = 'localhost'
    )
    {
        try {
            if ($this->_connection === null) {
                $this->_connection = new mysqli($server, $dbUsername, $dbPassword, $dbName);
                if ($this->_connection->connect_error) {
                    $this->_connection = null;
                    throw new Exception("Nao foi possivel se conectar a base de dados.");
                }
            }
        } catch (Exception $e) {
            //todo logger
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function getConnection()
    {
        return $this->_connection;
    }

    /**
     * @return Connector
     */
    public static function getConnector()
    {
        if (self::$_connectorInstance) {
            return self::$_connectorInstance;
        } else {
            self::$_connectorInstance = new Connector();
            return self::$_connectorInstance;
        }
    }
}