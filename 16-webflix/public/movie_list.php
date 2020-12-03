<?php require '../partials/header.php';

/**
 * 1. Poser le dropdown comme sur la maquette (Bootstrap)
 * 2. Définir un lien comme movie_list.php?sort=released_at
 * 3. Récupérer le paramètre sort de l'URL ($_GET)
 * 4. Grâce à ce paramètre, modifier la requête SQL...
 */

// On va récupèrer la liste des films
$movies = getMovies();
?>

<div class="container">
    <a href="movie_list.php?sort=released_at">Tri par date</a>

    <div class="row">
        <?php foreach ($movies as $movie) {
            require '../partials/card-movie.php';
        } ?>
    </div>
</div>

<?php require '../partials/footer.php';
