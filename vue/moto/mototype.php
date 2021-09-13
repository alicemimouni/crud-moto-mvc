<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des motos</title>
   <?php
    include 'vue/parts/stylesheets.php';
   ?>
</head>
<body>
    <?php
        require 'vue/parts/menu.php';
    ?>

    <h2 class="mt-4 text-center mb-4">Liste des motos triées par type</h2>
<div class="container text-center">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($motos as $moto){
                    $content = '<tr>
                    <td>'.$moto->getIdMoto().'</td>
                    <td>'.$moto->getBrand().'</td>
                    <td>'.$moto->getModele().'</td>
                    <td>'.$moto->getType().'</td>';
                
                    if(!is_null($moto->getImage())) {
                        $content .= '<td><img width="100px" src="public/img/' .$moto->getImage().'">';
                    }
                    else {
                        $content .= '<td>Aucune image</td>';
                    }
                    echo($content);
       
                    echo('<td>
                        <a href="index.php?controller=moto&action=delete&id=' .$moto->getIdMoto().'">Supprimer</a><hr>
                        <a href="index.php?controller=moto&action=detail&id='.$moto->getIdMoto().'">Voir en détail</a>
                    </td>
                    </tr>');
                }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>