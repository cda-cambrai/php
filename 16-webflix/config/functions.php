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
