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

    $query = $db->query('SELECT * FROM `movie` WHERE `title` LIKE "%'.$q.'%"');

    return $query->fetchAll();
}
