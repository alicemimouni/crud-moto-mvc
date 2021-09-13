<?php
class SecurityController{

    private $utilisateurManager;
  
    public function __construct(){
        $this->utilisateurManager = new UtilisateurManager();
    }

//CONNEXION
    public function login() {
        
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include 'vue/security/login.php';
        } 
        else {
            if(empty($_POST['username'])){
                $errors[] = 'Veuillez saisir un utilisateur';
            }
            if(empty($_POST['password'])){
                $errors[] = 'Veuillez saisir un mot de passe';
            }
            $userWithThisUsername = $this->utilisateurManager->findOneByUsername($_POST['username']);

            if(!$userWithThisUsername){
                $errors[] = 'Cet utilisateur n\'est pas connu.';
            } 
            else {
                $utilisateur = $userWithThisUsername;

                if(password_verify($_POST['password'], $utilisateur->getPassword())){
                   $_SESSION['utilisateur'] = serialize($utilisateur); 
                   header("Location: index.php?controller=moto&action=list");
                } 
                else {
                    $errors[] = 'Les identifiants sont incorrects';
                }
            }
            if(count($errors)>0){
                include 'vue/security/login.php';
            }
        }

    }
//DECONNEXION
    public function logout() {
        session_destroy();
        header('Location: index.php?controller=security&action=login');
    }
}
?>