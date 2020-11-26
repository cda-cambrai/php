<?php

/**
 * Traitement des fichiers en PHP
 */

// En PHP, on peut ouvrir un fichier comme dans Word
$fichier = fopen('mes-commandes.txt', 'a+');
// Le second paramètre est le mode de lecture
// r: read-only -> ouvre le fichier en lecture seule
// r+: Ouvre le fichier en écriture et lecture et laisse le curseur au début du fichier
// w+: write -> Ouvre le fichier en écriture et lecture mais supprime le fichier ou le créé s'il existe pas.
// a: append -> Ouvre le fichier en écriture et place le curseur à la fin du fichier
// a+: Comme le append sauf qu'il va créer le fichier s'il n'existe pas
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de candidature</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            // Si le formulaire est soumis, on prend la commande
            if (!empty($_POST['prenom'])) {
                $prenom = $_POST['prenom'];
                // On ouvre le fichier
                $fichier = fopen('mes-commandes.txt', 'a+');
                // On peut ajouter du texte dans le fichier
                // Si on veut passer à la ligne, on peut utiliser une constante spéciale
                fwrite($fichier, $prenom.' a commandé un livre le 26/11/2020'.PHP_EOL);
                // Avec cette ligne, on n'a plus besoin de faire le fopen ni le fwrite
                file_put_contents('mes-commandes.txt', $prenom.' a commandé un livre le 26/11/2020'.PHP_EOL);

                echo 'Votre commande arrive dans 3 jours';
                fclose($fichier); // On ferme le fichier, pas vraiment important
            }
        ?>
        <form method="POST">
            <input type="text" name="prenom" class="form-control">
            <button class="btn btn-primary">Commander</button>
        </form>

        <div>
            <h1>La liste des commandes</h1>
            <?php
                // On peut lire le contenu d'un fichier
                $fichier = fopen('mes-commandes.txt', 'r');
                $commandes = fread($fichier, 1000000);
                $commandes = file_get_contents('mes-commandes.txt'); // Avec cette ligne, on n'a plus besoin de faire le fopen ni le fread
                // echo $commandes;
                // Je remplace tous les retours à la ligne du fichier par une balise br
                echo str_replace(PHP_EOL, '<br />', $commandes);
            ?>
        </div>
    </div>
</body>
</html>
