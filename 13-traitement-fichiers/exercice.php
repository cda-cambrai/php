<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Click'N Collect</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            // Si le formulaire est soumis, on prend la commande
            if (!empty($_POST['email'])) {
                $email = $_POST['email'];
                $produits = $_POST['produits']; // Me renvoie un tableau avec les produits cochés (checkbox)
                // On ouvre le fichier
                //$fichier = fopen('mes-commandes.txt', 'a+');
                // On peut ajouter du texte dans le fichier
                // Si on veut passer à la ligne, on peut utiliser une constante spéciale
                //fwrite($fichier, $email.' a commandé un livre le 26/11/2020'.PHP_EOL);
                // Avec cette ligne, on n'a plus besoin de faire le fopen ni le fwrite
                // Attention avec cette méthode, il faut ajouter FILE_APPEND en 3ème paramètre pour ajouter au fichier et ne pas l'écraser
                $contenu = $email.' a commandé '.implode(', ', $produits).' le '.date('d/m/Y H:i:s').PHP_EOL;
                file_put_contents('mes-commandes.txt', $contenu, FILE_APPEND);

                echo 'Votre commande arrive dans 3 jours';
                //fclose($fichier); // On ferme le fichier, pas vraiment important
            }
        ?>
        <form method="POST">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control"> <br />

            <input type="checkbox" name="produits[]" id="harry" value="Harry Potter">
            <label for="harry">Harry Potter</label>
            <input type="checkbox" name="produits[]" id="batman" value="Batman">
            <label for="batman">Batman</label>
            <input type="checkbox" name="produits[]" id="pokemon" value="Pokemon">
            <label for="pokemon">Pokémon</label>

            <button class="btn btn-primary">Commander</button>
        </form>
    </div>
</body>
</html>
