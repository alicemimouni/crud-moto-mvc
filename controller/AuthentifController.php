<?php
    abstract class AuthentifController{
        public $utilisateur;

        public function __construct(){
           // REDIRECTS USERS WHO ARE NOT LOGGED IN
            if(!isset($_SESSION['utilisateur'])){
                header('Location: index.php?controller=security&action=login');
            }
            else{
                $this->utilisateur = unserialize($_SESSION['utilisateur']);
            }
        }
    }


?>
