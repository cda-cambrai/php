<?php

/**
 * Je vous laisse créer la page pour voir un acteur seul
 * 1. Ecrire une requête pour afficher le nom de l'acteur
 * 2. Ecrire une autre requête pour afficher les films de cet acteur
 * 3. BONUS: Faire tout cela en 1 seule requête...
 *    (On peut enchainer les join...)
 */

require '../partials/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    display404();
}

// Récupère l'acteur en BDD
$actor = getActor($id);
// 3. BONUS: Faire tout cela en 1 seule requête...
$actorWithMovies = getActorWithMovies($id);
// On prend la première ligne qui nous renvoie l'acteur
// Si on n'a pas d'index 0, on renvoie false
$actor = $actorWithMovies[0] ?? false;
$movies = $actorWithMovies;

if (!$actor) {
    display404();
}

// Récupère les films de l'acteurs
// $movies = getMoviesFromActor($actor['id']);
?>

<div class="container my-4">
    <h1>Les films de <?= $actor['firstname'].' '.$actor['name']; ?></h1>

    <div class="row">
        <?php foreach ($movies as $movie) {
            if ($movie['id']) {
                require '../partials/card-movie.php';
            }
        } ?>
    </div>
</div>

<?php require '../partials/footer.php';
