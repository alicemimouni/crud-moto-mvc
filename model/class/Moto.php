<?php
    class Moto{
        private $idMoto;
        private $brand;
        private $modele;
        private $image;
        private $type;
        public function __construct($brand, $modele, $image, $type, $idMoto = null){
            $this->brand = $brand;
            $this->modele = $modele;
            $this->image = $image;
            $this->type = $type;
            $this->idMoto = $idMoto;
        }
//MOTO
        public function getIdMoto(){
                return $this->idMoto;
        }
        public function setIdMoto($idMoto){
                $this->idMoto = $idMoto;
        }
//BRAND
        public function getBrand() {
            return $this->brand;
        }
        public function setBrand($brand) {
            $this->brand  = $brand;
        }
//MODEL
        public function getModele(){
            return $this->modele;
        }
        public function setModele($modele){
            $this->modele = $modele;
        }
//IMAGE
        public function getImage() {
            return $this->image;
        }
        public function setImage($image) {
            $this->image = $image;
        }
//TYPE
        public function getType(){
            return $this->type;
        }
        public function setType($type){
            $this->type = $type;
        }
    }


?>
