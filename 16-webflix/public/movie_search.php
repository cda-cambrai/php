<?php

/**
 * 1. Dans ce fichier, on va afficher les films par rapport à la recherche
 * 2. On doit récupèrer le paramètre q (pour query) dans l'URL
 * 3. Si le paramètre n'est pas présent, soit on affiche une 404, soit un message, soit on redirige vers les films
 * 4. Si le paramètre est présent, il faut faire la bonne requête SQL (LIKE)
 * 5. On affiche le résultat (les films) comme sur les autres pages...
 * 6. Et s'il n'y a pas de films ? On affiche "La recherche n'a rien donné"
 */

require '../partials/header.php';

// 2. On doit récupèrer le paramètre q (pour query) dans l'URL
if (isset($_GET['q'])) {
    $q = $_GET['q'];
} else {
    // 3. Si le paramètre n'est pas présent, soit on affiche une 404, soit un message, soit on redirige vers les films
    echo '<div class="container"> <h1>404</h1> </div>';
    require '../partials/footer.php'; exit();
}

// Nouvel opérateur en PHP 7 : Null coalesce
// $q = $_GET['q'] ?? null; // Si $_GET['q'] est isset, $q vaut $_GET['q'] sinon $q vaut null

/* if ($q === null) {
    echo '<div class="container"> <h1>404</h1> </div>';
} */

// 4. Si le paramètre est présent, il faut faire la bonne requête SQL (LIKE)
$movies = searchMovie($q);

// 5. On affiche le résultat (les films) comme sur les autres pages...
?>
<div class="container">
    <div class="dropdown my-4">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            Trier par
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="movie_search.php?sort=title&q=<?= $q; ?>">Nom</a>
            <a class="dropdown-item" href="movie_search.php?sort=duration&q=<?= $q; ?>">Durée</a>
            <a class="dropdown-item" href="movie_search.php?sort=released_at&q=<?= $q; ?>">Date</a>
        </div>
    </div>

    <div class="row">
        <?php
        // 6. Et s'il n'y a pas de films ? On affiche "La recherche n'a rien donné"
        if (empty($movies)) { ?>
            <h1>La recherche n'a rien donné...</h1>
        <?php }

        foreach ($movies as $movie) {
            require '../partials/card-movie.php';
        } ?>
    </div>
</div>

<?php require '../partials/footer.php';
