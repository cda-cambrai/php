<?php
// On inclus tous les fichiers de configuration du site
require '../config/database.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webflix</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container"> <!-- Le contenu de la navbar est dans un container -->
            <a class="navbar-brand" href="#">Webflix</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nos films</a>
                    </li>
                    <?php
                        /*
                         * 1. On doit écrire ici une requête qui récupère les catégories
                         * 2. Ensuite, on va parcourir le tableau de catégorir et "remplir" le dropdown
                         *    avec ces catégories
                         * 3. BONUS: Ranger le code PHP dans une fonction getCategories();
                         *    Idéalement, on mets la fonction dans le fichier functions.php (à inclure)
                         *    $categories = getCategories();
                         */
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                            Dropdown
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher...">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Go</button>
                </form>
            </div>
        </div> <!-- Fin du .container -->
    </nav>
