<?php
include_once("config.php");
class DatabaseAccess {

    private $_connection;

    function __construct() {
        global $host_name;
        global $port;
        global $database_name;
        global $username;
        global $password;

        try {
            $this->_connection = new PDO('mysql:host='.$host_name.';dbname='.$database_name.';port='.$port, $username, $password, array(PDO::ATTR_PERSISTENT => true));
        } catch (\PDOException $e) {
            echo 'Something went wrong: ' . $e->getMessage();
        }
    }

    public function get_connection() {
        $connection = $this->_connection;
        return $connection;
    }
}