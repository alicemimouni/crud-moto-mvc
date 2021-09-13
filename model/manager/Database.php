<?php

abstract class Database {
    protected $db;

    private $host = 'localhost';
    private $dbName = 'exam_moto_poo_alice';
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