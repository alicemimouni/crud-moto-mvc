<?php
class Utilisateur {

    private $id;
    private $username;
    private $password;

    public function __construct($username, $password, $id = null) {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }
//ID
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
//USERNAME
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
//PASSWORD
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}

?>
