<?php

/**
 * Cette page sera comme movie_list.php sauf que :
 * - On doit récupérer l'id de la catégorie dans l'URL
 * - Faire la requête pour récupèrer les films de cette catégorie
 * - Ne pas afficher les filtres
 */

require '../partials/header.php';

// On doit récupérer l'id de la catégorie dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // On affiche une 404 si la catégorie n'est pas définie dans l'URL
    display404();
}

// On récupère les films de la catégorie en question
$movies = getMoviesByCategory($id);
// On récupère la catégorie
$category = getCategory($id);

// Si la catégorie n'existe, on affiche une 404
if (!$category) {
    display404();
}

// J'affiche les films ?>
<div class="container">
    <h1 class="my-4 text-center"><?= $category['name']; ?></h1>
    <div class="row">
        <?php foreach ($movies as $movie) {
            require '../partials/card-movie.php';
        } ?>
    </div>
</div>

<?php require '../partials/footer.php';
