<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales en PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <a href="https://google.fr/search?q=sac">Rechercher un sac sur google</a> <br />
        <a href="index.php?q=sac">Rechercher un sac</a> <br />
        <a href="index.php?q=telephone&b=ios">Rechercher un téléphone iOS</a> <br />
        <a href="index.php?q=telephone&b=android">Rechercher un téléphone Android</a> <br />

        <br />

        <?php
            // On va essayer de voir si le paramètre q est présent dans l'URL
            // et surtout qu'il ne soit pas vide
            $q = null;
            if (isset($_GET['q']) && !empty($_GET['q'])) {
                $q = $_GET['q'];
                echo '<h1>Vous avez recherché '.$q.'</h1>';
            }

            // On va faire pareil pour la marque
            $b = null;
            if (isset($_GET['b']) && !empty($_GET['b'])) {
                $b = $_GET['b'];
            }
        ?>

        <!-- Le autocomplete permet d'enlever l'historique du navigateur -->
        <form class="d-flex" autocomplete="off">
            <!-- Le name du input est très important pour que PHP
            puisse savoir ce qu'il doit mettre comme clé dans $_GET -->
            <input type="text" class="form-control" name="q"
                   value="<?php echo $q; ?>"
                   placeholder="Saisir votre recherche">

            <select class="form-control" name="b">
                <option <?php if ($b === 'iOS') { echo 'selected'; } ?>>iOS</option>
                <option <?php if ($b === 'Android') { echo 'selected'; } ?>>Android</option>
            </select>

            <!-- Quand on clique sur le bouton, on soumet le formulaire -->
            <!-- Soumettre le formulaire signifie rediriger l'utilisateur -->
            <!-- vers la page actuelle (index.php) avec -->
            <!-- les champs du formulaire (le input avec le name q) -->
            <button class="btn btn-primary">Chercher</button>
        </form>

        <?php
            // Les superglobales
            // On peut récupèrer les paramètres de l'URL dans $_GET
            // Si on tape dans l'url "index.php?q=toto", $_GET va contenir le tableau ['q' => 'toto']
            // Si on tape "index.php?q=telephone&b=ios", $_GET contient ['q' => 'telephone', 'b' => 'ios']

            var_dump($_GET);
        ?>

        <!-- On a également un $_POST en PHP -->
        <!-- Par exemple, on se sert de $_POST pour "cacher" les données dans l'URL -->
        <h2>Formulaire avec $_POST</h2>

        <!-- Pour utiliser $_POST, on a juste à changer la méthode du formulaire -->
        <form method="POST">
            <input type="password" name="password" class="form-control">

            <button class="btn btn-primary">Accès à la NASA</button>
        </form>

        <?php
            var_dump($_POST);
            // Si le mot de passe est bon, on a accès au document secret
            // On va imaginer que le mot de passe doit être abcdef
            if (isset($_POST['password']) && $_POST['password'] === 'abcdef') {
                echo 'INFO SECRETE: Nous sommes en confinement';
            }
        ?>
    </div>
</body>
</html>
