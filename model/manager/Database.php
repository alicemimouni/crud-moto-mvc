<?php

abstract class Database {
    
    protected $db;
    private $host = 'localhost';
    private $dbName = 'db_moto_alice';
    private $user = 'root';
    private $passWord = '';

    public function __construct() {
        try {
            $this->db = new \PDO('mysql:dbname='.$this->dbName.'; charset=utf8;host='.$this->host, $this->user, $this->passWord);
        }
        catch (\PDOException $e) {
            throw $e;
        }
    }
}

?>
