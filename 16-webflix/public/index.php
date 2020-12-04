<?php require '../partials/header.php';

// Comment faire une requête avec le PDO
// La méthode query de PDO renvoie un objet PDOStatement, cela ne renvoie
// pas encore le résultat de la requête
// Ici, on fait la requête pour récupèrer les catégories
// $query = $db->query('SELECT * FROM category');

// fetchAll renvoie un tableau qui contient toutes les lignes de résultat
// de la requête précèdente
// $categories = $query->fetchAll();

// On peut aller plus vite en écrivant cela
// $categories = $db->query('SELECT * FROM category')->fetchAll();

// On va parcourir toutes les catégories
// RAPPEL: <?= équivaut à <?php echo
/* echo '<div class="row">';
foreach ($categories as $category) { ?>

    <div class="col-6">
        <h1><?= $category['name']; ?></h1>
    </div>

<?php } // Fin du foreach
echo '</div>'; */

/**
 * 1. On va poser le carousel des films ci-dessous
 * 2. Par défaut, on utilise Bootstrap et on va afficher 3 jaquettes de films par slide (Voir vidéo)
 * 3. On aura 3 slides donc 9 films ce qui veut dire qu'on doit écrire une requête SQL qui récupère
 *    les 9 derniers films par date de sortie dont le champ cover n'est pas null.
 * 4. Pour la boucle, on part d'un tableau de 9 éléments et on doit l'afficher dans le code HTML ci-dessous
 */
$carouselMovies = $db->query('SELECT * FROM movie WHERE cover IS NOT NULL ORDER BY released_at DESC LIMIT 9')->fetchAll();
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php /* Code alternatif pour afficher les films dans les slides
        foreach ([0, 3, 6] as $key) { ?>
            <div class="carousel-item <?php if ($key === 0) { echo 'active'; } ?>">
                <div class="d-flex">
                    <img src="assets/uploads/<?= $carouselMovies[$key]['cover']; ?>" class="d-block" alt="<?= $carouselMovies[$key]['title']; ?>">
                    <img src="assets/uploads/<?= $carouselMovies[$key+1]['cover']; ?>" class="d-block" alt="<?= $carouselMovies[$key+1]['title']; ?>">
                    <img src="assets/uploads/<?= $carouselMovies[$key+2]['cover']; ?>" class="d-block" alt="<?= $carouselMovies[$key+2]['title']; ?>">
                </div>
            </div>
        <?php } */ ?>

        <?php foreach ($carouselMovies as $index => $movie) {
            /* if ($index === 0) { // Si on est sur le premier film
                echo '<div class="carousel-item active">';
            } else {
                echo '<div class="carousel-item">';
            } */
        ?>
            <!-- On peut écrire un if sur un seul ligne grâce au ternaire -->
            <!-- ? équivaut à if () { } -->
            <!-- : équivaut au else -->
            <!-- On peut aussi faire ($index !== 0) ?: 'active'; -->
            <?php if ($index % 3 === 0) { ?>
                <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                    <div class="d-flex">
            <?php } ?>

                <img src="assets/uploads/<?= $movie['cover']; ?>" class="d-block" alt="<?= $movie['title']; ?>">

            <?php if (($index + 1) % 3 === 0) { ?>
                    </div> <!-- Fin de la div .d-flex -->
                </div>
            <?php } ?>

        <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
/**
 * 1. Sur cette page, on doit afficher 4 films aléatoires de la base de données.
 * 2. Pour les étoiles et les images, tout sera envoyé sur Discord
 * 3. On affichera bien une div row de 4 div col-3 sur la page
 * 4. On peut utiliser le composant Card de Bootstrap pour les films
 * 5. Pour les images, il faudra utiliser le champ cover de la BDD
 * 6. On mets les images dans le dossier uploads/
 */
$randomMovies = $db->query('SELECT *, YEAR(released_at) as year FROM movie ORDER BY RAND() LIMIT 4')->fetchAll();
?>

<div class="container mt-4 mb-5">
    <h2>Sélection de films aléatoire</h2>

    <div class="row">
        <?php foreach ($randomMovies as $movie) { ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card shadow mb-4">
                    <img src="assets/uploads/<?= $movie['cover']; ?>" class="card-img-top" alt="<?= $movie['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $movie['title']; ?></h5>
                        <!-- Pour l'année, on a la solution en PHP -->
                        <p>Sorti en <?= substr($movie['released_at'], 0, 4); ?></p>
                        <!-- On a aussi la solution en SQL (La clé du tableau est l'alias) -->
                        <!-- Attention entre commentaire HTML et commentaire PHP -->
                        <!-- Le commentaire HTML se voit dans le code source, pas le PHP -->
                        <!-- <p>Sorti en <?= $movie['year']; ?></p> -->
                        <p class="card-text"><?= $movie['description']; ?></p>
                        <a href="#" class="btn btn-danger btn-block">Voir le film</a>
                    </div>
                    <div class="card-footer text-muted">
                        ★★★☆☆
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require '../partials/footer.php';
