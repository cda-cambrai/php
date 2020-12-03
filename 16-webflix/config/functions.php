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
 */
function getMovies() {
    global $db;
    // backtick = Alt Gr + 7 = ``
    $query = $db->query('SELECT * FROM `movie`');

    return $query->fetchAll();
}
