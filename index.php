<?php
session_start();

    require 'autoload.php';

    if (empty($_GET['controller']) || empty($_GET['action'])) {
        header('Location: index.php?controller=security&action=login');
    }

//SECURITY
    if($_GET['controller'] == 'security'){
        $controller = new SecurityController();
        
        if($_GET['action'] == 'login'){
            $controller->login();
        }
        if($_GET['action'] == 'logout') {
            $controller->logout();
        }
    }

//MOTO
    if($_GET['controller'] == 'moto'){
        $controller = new MotoController();
    //SHOW ALL MOTOS
        if($_GET['action'] == 'list'){
            $controller->list();
        }
    //SORT BY TYPE
        if($_GET['action'] == 'mototype') {
            $controller->mototype();
        }
    //DETAIL
    if($_GET['action'] == 'detail') {
        $controller->detail($_GET['id']);
    }
    
    //ADD
        if($_GET['action'] == 'add') {
            if(!empty($_SESSION['utilisateur'])) {
                $controller->add();
            }
            else {
                echo('Action interdite');
            }
        }
    //DELETE
        if($_GET['action'] == 'delete' && isset($_GET['id'])) {
            if(!empty($_SESSION['utilisateur'])) {
                $controller->delete($_GET['id']);
            }
            else {
                echo('Action interdite');
            }
        }

    }

    

?>
