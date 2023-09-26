<!DOCTYPE html>

<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
    
<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="" width="50px" alt="MotoTop"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav w-100 d-flex align-items-center justify-content-around">
            <li class="nav-item">
              <a class="nav-link" href="index.php?controller=moto&action=list">Liste des motos</a>
            </li>
              
            <?php

                //TODO
                    // echo('<li class="nav-item">
                    //     Bonjour '.unserialize($_SESSION['utilisateur'])->getUsername().'
                    //     </li>');

                // ADD
                    echo('<li class="nav-item">
                    <a class="nav-link" href="index.php?controller=moto&action=add">Ajouter une moto</a>
                    </li>');

                // SORT BY TYPE
                    echo('<li class="nav-item">
                    <a class="nav-link" href="index.php?controller=moto&action=mototype">Trier par type</a>
                    </li>');

                // LOGIN
                  echo('<li class="nav-item">
                  <a class="nav-link text-success" href="index.php?controller=security&action=login">Connexion</a>
                  </li>');

                //DECONNEXION  
                    echo('<li class="nav-item">
                    <a class="nav-link text-danger" href="index.php?controller=security&action=logout">Deconnexion</a>
                    </li>');
              
            ?>
          </ul>
        </div>
      </div>
    </nav>

</body>
    
</html>
