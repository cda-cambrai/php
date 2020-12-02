<?php require '../partials/header.php';

// Comment faire une requête avec le PDO
// La méthode query de PDO renvoie un objet PDOStatement, cela ne renvoie
// pas encore le résultat de la requête
// Ici, on fait la requête pour récupèrer les catégories
$query = $db->query('SELECT * FROM category');

// fetchAll renvoie un tableau qui contient toutes les lignes de résultat
// de la requête précèdente
$categories = $query->fetchAll();

// On peut aller plus vite en écrivant cela
$categories = $db->query('SELECT * FROM category')->fetchAll();

// On va parcourir toutes les catégories
// RAPPEL: <?= équivaut à <?php echo
echo '<div class="row">';
foreach ($categories as $category) { ?>

    <div class="col-6">
        <h1><?= $category['name']; ?></h1>
    </div>

<?php } // Fin du foreach
echo '</div>';

require '../partials/footer.php';
