<?php

    class MotoManager extends Database {

//FONCTION QUI RECUPERE TOUTES LES MOTOS
        public function getAll(){
            try{
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
//FONCTION QUI RECUPERE LES MOTOS TRIEES PAR TYPE
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

//FONCTION QUI RECUPERE UNE MOTO EN FONCTION DE SON ID
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
  
//RECUPERE UNE MOTO EN FONCTION DE SON MODELE
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

// SUPPRIME UNE MOTO
        public function delete(Moto $moto) {
            try{
                $request = $this->db->prepare('DELETE FROM moto WHERE idMoto = :idMoto');
                $request->execute(['idMoto' => $moto->getIdMoto()]);
            }
            catch(\PDOException $e) {
                throw $e;
            }
        }

// INSERE UNE MOTO
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
               
//FONCTION QUI TRANSFORME ARRAY EN OBJETS
        public function arrayResultToArrayObject($arrayOfArray){
            $arrayMoto = [];
            
            foreach($arrayOfArray as $elem){
                $arrayMoto[] = new Moto($elem['brand'], $elem['modele'], $elem['image'], $elem['type'], $elem['idMoto']);
            }
            return $arrayMoto;
        }
}

?>