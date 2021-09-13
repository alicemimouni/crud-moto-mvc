<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <?php
    include 'vue/parts/stylesheets.php';
    ?>
</head>
<body>
<body>
<div class="container m-4 w-50">
    <h1>Connexion utilisateur</h1>

    <form method="post">
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input name="username" type="text" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>

        <button type="submit" class="btn btn-warning mt-4">Connexion</button>
        
        <?php
      //APPEL DU FICHIER ERREURS FORMULAIRES
        require 'vue/parts/errors-forms.php';
        ?>
    </form>

</div>
</body>
</body>
</html>