<?php

/**
 * Cette page permet de supprimer un film
 */

ob_start();

require '../partials/header.php';

/*if (isAdmin() && isset($_GET['id'])) {
    // Faire la requête pour supprimer le film
    $query = $db->prepare('DELETE FROM movie WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    header('Location: movie_list.php');
} else if (!isAdmin()) {
    display403();
} else if (!isset($_GET['id'])) {
    display404();
}*/

// Vérifie que l'utilisateur a le droit d'accèder à la page
if (!isAdmin()) {
    // On affiche bien une 403 pour indiquer que la page est interdite d'accès
    display403();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Si pas d'id dans l'url, on affiche une 404
    display404();
}

/*
 * Attention à la faille CSRF...
 * - Pour se protéger de la faille, il faut générer un token (un code aléatoire) qu'on stocke dans la session
 * - Pour supprimer un film, on ajoutera le token dans l'url et on vérifiera que ce token correspond à celui de
 * la session
 */

// Ici, on vérifie que l'utilisateur n'est pas victime d'une attaque CSRF
if (!isset($_GET['token']) || $_GET['token'] !== $_SESSION['token']) {
    display403();
}

// Faire la requête pour supprimer le film
$query = $db->prepare('DELETE FROM movie WHERE id = :id');
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();

header('Location: movie_list.php');

// On a pas besoin du footer pour la suppression
