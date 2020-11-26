<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes Click'N Collect</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            $fichier = fopen('mes-commandes.txt');
            $commandes = fread($fichier, 1000000);
            // On va essayer de lire le fichier mes-commandes.txt
            $commandes = file_get_contents('mes-commandes.txt');

            // On peut transformer le contenu du fichier en tableau
            $commandes = explode(PHP_EOL, $commandes);

            // echo str_replace(PHP_EOL, '<br />', $commandes);

            // Je parcours le tableau et pour chaque chaine, je mets un h1
            foreach ($commandes as $commande) {
                echo '<h1>'.$commande.'</h1>';
            }
        ?>
    </div>
</body>
</html>
