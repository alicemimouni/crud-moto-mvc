<?php
    class MotoController extends AuthentifController {
        
        private $motoManager;

        public function __construct() {
           // Parent::__construct();
            $this->motoManager = new MotoManager();
        }   

    //GET ALL MOTOS
        public function list() {
            $motos = $this->motoManager->getAll();
            require 'vue/moto/list.php';
        }

    // GET MOTOS SORTED BY TYPE
        public function mototype() {
            $motos = $this->motoManager->motoByType();
            require 'vue/moto/mototype.php';
        }

    //GET MOTO DETAIL
        public function detail($id) {
            $moto = $this->motoManager->getOne($id);
            require 'vue/moto/detail.php';
        }

    //ADD A MOTO
        public function add() {
            $errors =[];
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $imgFileName = null;

                $errors = $this->getFormErrors();

                if(count($errors) == 0) {
                   
                  $upload = $this->uploadFile();
                  $errors = $upload['errors'];
                  $imgFileName = $upload['filename'];

                    if(count($errors) == 0) {
                        $moto = new Moto($_POST['brand'], $_POST['modele'], $_POST['type'], $imgFileName);
                        $this->motoManager->add($moto);
                        header('Location: index.php?controller=moto&action=list');
                    }
                }
            }
            require 'vue/moto/add-moto.php';
        }

    //DELETE
        public function delete($id) {

            $moto = $this->motoManager->getOne($id);
            if(is_null($moto)) {

            }
            else {
                $this->motoManager->delete($moto);
                header('Location: index.php?controller=moto&action=list');
            }

        }

    // FORM ERRORS
        private function getFormErrors($id = null) {
            $errors = [];
            if(empty($_POST['brand'])) {
                $errors[] = 'entrer la marque';
            }
            if(empty($_POST['modele'])) {
                $errors[] = 'entrer le modèle';
            }
            if(empty($_POST['type'])) {
                $errors[] = 'entrer le type';
            }
            
            $moto = $this->motoManager->getByModele($_POST['modele']);
            if(!is_null($moto) && $moto->getIdMoto() != $id) {
                $errors[] = 'Ce modèle existe déjà';
            }
            return $errors;
        }

    //UPLOAD FILE
        private function uploadFile() {
            $extensionAllowed = ['image/jpeg', 'image/png'];
            $errors = [];
            $imgFileName = null;
            if($_FILES['image']['size'] != 0) {
                $img = $_FILES['image'];
                if($img['size'] >1000000) {
                    $errors[] = 'L\'image est trop grosse';
                }
                if(!in_array($img['type'], $extensionAllowed)) {
                    $errors[] = 'Type de fichier incorrect';
                }
                if($img['error'] !=0) {
                    $errors[] = 'erreur de telechargement';
                }
                if(count($errors) == 0) {
                    //UPLOAD IMAGE
                    $imgFileName = uniqid().'.'.explode('/', $img['type'])[1];
                    move_uploaded_file($img['tmp_name'], 'public/img/'.$imgFileName);
                }
            }   
            return ['filename' => $imgFileName, 'errors' => $errors];
        }
        
    }



?>
