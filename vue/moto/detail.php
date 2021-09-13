<html>
<head>
    <?php
    include 'vue/parts/stylesheets.php';
    ?>
</head>
<body>
<?php
include 'vue/parts/menu.php';
?>
<div class="container text-center">
    <h1 class="text-success mt-4">Modèle : <?php echo($moto->getModele());?></h1>

    <h2>Marque : <?php echo($moto->getBrand()); ?></h2>
    <img src="<?php echo('public/img/'.$moto->getImage())?>" width="300px">

    <h2>Type :  <?php echo($moto->getType());?></h2>
</div>
</body>
</html>