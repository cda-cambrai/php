<?php

/**
 * Récupèrer les informations du film
 * 1. Sur chaque lien "Voir le film", on doit ajouter un lien vers
 *    movie_single.php?id=5
 * 2. Sur cette page, on va récupèrer l'id dans l'URL
 * 3. On doit vérifier si l'id est présent ou non (404)
 * 4. On doit récupèrer le film dans la BDD avec l'id
 *    (404 s'il n'existe pas)
 * 5. On affiche les informations du film
 *    (Jaquette + titre, durée, date, description)
 * Entre 45min et 1h
 * 6. On va aussi afficher le nom de la catégorie du film
 */

require '../partials/header.php';

// 2. Sur cette page, on va récupèrer l'id dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Si pas d'id dans l'url, on affiche une 404
    display404();
}

// On récupère le film concerné
$movie = getMovie($id);

// On renvoie une 404 si le film n'existe pas
if (!$movie) {
    display404();
}

?>

<div class="container my-4">
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid" src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h1><?= $movie['title']; ?></h1>
                    <p>Durée: <?= convertToHours($movie['duration']); ?></p>
                    <p>Sorti le <?= formatDate($movie['released_at']); ?></p>

                    <div>
                        <?= $movie['description']; ?>
                    </div>
                </div> <!-- Fin .card-body -->
                <div class="card-footer text-muted">
                    ★★★☆☆
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../partials/footer.php';
