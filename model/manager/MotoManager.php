<?php

    class MotoManager extends Database {

//GET ALL MOTOS
        public function getAll() {
            try {
            $request = $this->db->prepare('SELECT * FROM moto');
            $request->execute();
            $result = $request->fetchAll();

            $arrayMoto = $this->arrayResultToArrayObject($result);
            return $arrayMoto;
            }
            catch(\PDOException $e) {
                throw $e;
            }
        }
// GET MOTOS SORTED BY TYPE
        public function motoByType() {
            try{
                $motos = [];
                $request = $this->db->prepare('SELECT * FROM moto ORDER BY type ASC');
                $request->execute();
                $result = $request->fetchAll();

                foreach($result as $elem) {
                    $motos[] = new Moto($elem['brand'], $elem['modele'], $elem['image'], $elem['type'],$elem['idMoto']);
               }
               return $motos; 
            }
            catch(\PDOException $e) {
                throw $e;
            }   
        }

// GET ONE MOTO BY ID
    public function getOne($id) {

        $moto = null;
        $request = $this->db->prepare('SELECT * FROM moto WHERE idMoto = :idMoto');
        $request->execute(['idMoto' => $id]);
        $result = $request->fetch();
        if($result) {
            $moto = new Moto($result['brand'], $result['modele'], $result['image'], $result['type'], $result['idMoto']);
        }
        return $moto;
    }
  
// GET ONE MOTO BY MODEL
    public function getByModele($modele) {
        $moto = null;
        $request = $this->db->prepare('SELECT * FROM moto WHERE modele = :modele');
        $request->execute(['modele' => $modele]);
        $result = $request->fetch();
        if($result) {
            $moto = new Moto($result['brand'], $result['modele'], $result['type'], $result['image'], $result['idMoto']);
        }
        return $moto;
    }

// DELETE MOTO
        public function delete(Moto $moto) {
            try{
                $request = $this->db->prepare('DELETE FROM moto WHERE idMoto = :idMoto');
                $request->execute(['idMoto' => $moto->getIdMoto()]);
            }
            catch(\PDOException $e) {
                throw $e;
            }
        }

// ADD MOTO
        public function add(Moto $moto) {
            try {
                $request = $this->db->prepare('INSERT INTO moto (brand, modele, image, type) VALUES (:brand, :modele, :image, :type)');
                $request->execute([
                    'brand' => $moto->getBrand(),
                    'modele' => $moto->getModele(), 'image' =>$moto->getImage(), 
                    'type' => $moto->getType()]);
                }
                catch (\PDOException $e) {
                    throw $e;
                }
            }
               
// CHANGE ARRAY TO OBJECT
        public function arrayResultToArrayObject($arrayOfArray) {
            $arrayMoto = [];
            
            foreach($arrayOfArray as $elem) {
                $arrayMoto[] = new Moto($elem['brand'], $elem['modele'], $elem['image'], $elem['type'], $elem['idMoto']);
            }
            return $arrayMoto;
        }
}

?>
