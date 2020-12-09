<?php

/*
 | -------------------------------
 | Fonctions utiles pour le site
 | -------------------------------
 |
 | Ici, on va déclarer toutes les fonctions qui seront
 | utilisables partout sur le site
 |
*/

/**
 * Permet de récupérer les catégories dans la BDD
 */
function getCategories() {
    global $db; // On utilise la variable $db (PDO)
    // Le ORDER BY sert uniquement à trier par ordre alphabétique
    $query = $db->query('SELECT * FROM `category` ORDER BY `name`');

    return $query->fetchAll();
}

/**
 * Permet de récupèrer les films dans la BDD
 * Le paramètre $orderBy permet de trier la requête
 */
function getMovies($orderBy) {
    global $db;
    // backtick = Alt Gr + 7 = ``
    // Pour éviter les injections SQL, on va vérifier le paramètre orderBy
    // Idéalement, on utilisera une requête préparée...
    if (!in_array($orderBy, ['id', 'title', 'duration', 'released_at'])) {
        // Si $orderBy vaut autre chose que id, title, duration ou released_at
        // on le force à id
        $orderBy = 'id';
    }

    $query = $db->query('SELECT * FROM `movie` ORDER BY '.$orderBy.' ASC');

    return $query->fetchAll();
}

/**
 * Permet de rechercher un film dans la BDD
 * La fonction nous renvoie un tableau de films
 */
function searchMovie($q) {
    global $db;

    $orderBy = $_GET['sort'] ?? 'id'; // Si $_GET['sort'] existe on prend sa valeur
    if (!in_array($orderBy, ['id', 'title', 'duration', 'released_at'])) {
        // Si $orderBy vaut autre chose que id, title, duration ou released_at
        // on le force à id
        $orderBy = 'id';
    }

    // $q = '%"; DROP table payment;';
    // Pour éviter les injections SQL, on doit utiliser une requête préparée
    // Attention, on ne peut pas passer un nom de colonne en paramètre...
    $query = $db->prepare('SELECT * FROM `movie` WHERE `title` LIKE :q ORDER BY '.$orderBy);
    // Le bindValue permet de remplacer les paramètres de la requête préparée par
    // la "vraie" valeur
    $query->bindValue(':q', '%'.$q.'%');
    $query->execute(); // Le execute est nécessaire lors d'une requête préparée
    // On peut aller plus vite et écrire ça
    // $query->execute([':q' => '%'.$q.'%']);

    return $query->fetchAll();
}

/**
 * Cette fonction permet d'afficher une 404
 */
function display404() {
    http_response_code(404); // On peut forcer le statut 404 sur la requête
    echo '<div class="container"> <h1>404</h1> </div>';
    require '../partials/footer.php'; exit();
}

/**
 * Cette fonction permet de récupérer les films par catégories
 */
function getMoviesByCategory($id) {
    global $db;

    $query = $db->prepare('SELECT * FROM `movie` WHERE category_id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Cette fonction permet de récupérer une catégorie seule
 */
function getCategory($id) {
    global $db;

    $query = $db->prepare('SELECT * FROM `category` WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch(); // Fetch renvoie une seule ligne
}

/**
 * Permet de récupère un film dans la BDD
 */
function getMovie($id) {
    global $db;

    $query = $db->prepare(
        'SELECT m.id, m.title, m.released_at, m.description, m.duration, m.cover, m.category_id, c.name as category_name
         FROM `movie` m
         INNER JOIN `category` c ON m.category_id = c.id
         WHERE m.id = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch();
}

/**
 * Convertir des minutes en heures et minutes
 * 124 devient 2h04
 */
function convertToHours($duration) {
    $hours = floor($duration / 60); // 2.06 devient 2
    $minutes = $duration - 60 * $hours; // 124 - 60 * 2 = 4

    if ($minutes < 10) {
        $minutes = '0'.$minutes;
    }

    return $hours.'h'.$minutes;
}

/**
 * Formatte une date du format US
 * 1975-08-01 -> 01 january 1975
 */
function formatDate($date, $format = 'd F Y') {
    // 01 january 1975
    $formatedDate = date($format, strtotime($date));

    $frenchMonths = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // On remplace March par mars et ainsi de suite...
    $formatedDate = str_replace($englishMonths, $frenchMonths, $formatedDate);

    return $formatedDate;
}

/**
 * Permet de récupèrer les commentaires d'un film
 */
function getCommentsByMovie($id) {
    global $db;

    $query = $db->prepare(
        'SELECT * FROM `comment` WHERE movie_id = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Récupère la moyenne d'un film
 */
function getAverageMovie($id) {
    global $db;

    $query = $db->prepare(
        'SELECT AVG(note) FROM `comment` WHERE movie_id = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    // On récupère la valeur de la première colonne de la ligne de résultat
    return round($query->fetchColumn(), 2);
}

/**
 * Récupèrer les acteurs d'un film
 */
function getActorsFromMovie($id) {
    global $db;

    $query = $db->prepare(
        'SELECT * FROM `movie_has_actor` `mha`
         INNER JOIN `actor` `a`
         ON `mha`.`actor_id` = `a`.`id`
         WHERE `movie_id` = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Récupère un acteur dans la BDD
 */
function getActor($id) {
    global $db;

    $query = $db->prepare(
        'SELECT * FROM `actor`
         WHERE id = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch();
}

/**
 * Récupère tous les films d'un acteur
 */
function getMoviesFromActor($id) {
    global $db;

    $query = $db->prepare(
        'SELECT * FROM `movie_has_actor` `mha`
         INNER JOIN `movie` `m` ON `m`.`id` = `mha`.`movie_id`
         WHERE `mha`.`actor_id` = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Jointure pour avoir un acteur et ses films
 */
function getActorWithMovies($id) {
    global $db;

    $query = $db->prepare(
        'SELECT `m`.`id`, `title`, `description`, `released_at`, `duration`, `cover`, `name`, `firstname`
         FROM `movie_has_actor` `mha`
         INNER JOIN `movie` `m` ON `m`.`id` = `mha`.`movie_id`
         RIGHT JOIN `actor` `a` ON `a`.`id` = `mha`.`actor_id`
         WHERE `a`.`id` = :id'
    );
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll();
}
