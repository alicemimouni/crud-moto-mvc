<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une moto</title>
    
    <?php
        include 'vue/parts/stylesheets.php';
    ?>
    
</head>

<body>
    
    <?php
        include 'vue/parts/menu.php';
    ?>
    
    <div class="container">
        <h2 class="text-uppercase mb-4 mt-4">Ajouter une moto</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="brand">Marque</label>
                <input name="brand" type="text" class="form-control" id="brand">
            </div>
            <div class="form-group">
                <label for="modele">Modèle</label>
                <input name="modele" type="text" class="form-control" id="modele">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input name="type" type="text" class="form-control" id="type">
            </div>
            <div class="form-group mt-4 mb-4">
                <label for="image">Image</label><br>
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-danger">Ajouter</button>
        </form>

        <?php
            require 'vue/parts/errors-forms.php';
        ?>
        
    </div>

</body>

</html>
