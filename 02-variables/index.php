<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
</head>
<body>
    <?php
        // Je déclare une variable et lui affecte une valeur (entier)
        $age = 28;

        // Je vais afficher le contenu de la variable
        // avec une concaténation si je le souhaite
        echo 'J\'ai '.$age.' ans <br />';

        // En PHP, il existe l'interpolation de variables
        // En utilisant les doubles quotes, on n'a pas besoin de
        // concaténer
        echo "J'ai $age ans";
    ?>
</body>
</html>
