<?php

class UtilisateurManager extends Database {

    public function findOneByUsername($username) {
        $request = $this->db->prepare("SELECT * FROM utilisateur WHERE username = :username");
        $request->execute(['username'=>$username]);
        $result = $request->fetch();
        return new Utilisateur($result['username'], $result['password'], $result['id']);
    }
}
?>
