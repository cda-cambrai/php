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
    $query = $db->query('SELECT * FROM `category` ORDER BY `name`');

    return $query->fetchAll();
}
