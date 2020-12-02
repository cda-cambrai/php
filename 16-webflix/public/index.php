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
 * 1. Sur cette page, on doit afficher 4 films aléatoires de la base de données.
 * 2. Pour les étoiles et les images, tout sera envoyé sur Discord
 * 3. On affichera bien une div row de 4 div col-3 sur la page
 * 4. On peut utiliser le composant Card de Bootstrap pour les films
 * 5. Pour les images, il faudra utiliser le champ cover de la BDD
 * 6. On mets les images dans le dossier uploads/
 */
$randomMovies = $db->query('SELECT *, YEAR(released_at) as year FROM movie ORDER BY RAND() LIMIT 4')->fetchAll();
?>

<div class="container">
    <div class="row">
        <?php foreach ($randomMovies as $movie) { ?>
            <div class="col-3">
                <div class="card mb-4">
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
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require '../partials/footer.php';
