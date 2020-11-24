<?php

/**
 * Il existe d'autres superglobales
 */

$_GET; // Permet de récupérer des informations dans l'URL
$_POST; // Permet de récupérer des informations dans la requête HTTP

$_REQUEST; // Contient $_GET, $_POST et $_COOKIE

$_COOKIE; // Contient tous les cookies du site
// Le cookie permet de stocker des infos sur notre PC pour le site
$_SESSION; // Contient toutes les sessions
// Une session est comme un cookie sauf qu'elle est sur le serveur et pas sur le PC

$_ENV; // Contient les variables d'environnements
// $_ENV['db'] = 'mongo';

$_SERVER; // Contient des informations sur notre serveur
var_dump($_SERVER);

$_FILES; // Permet de récupérer les fichiers uploadés

/**
 * Il est possible de créer des variables de manière dynamique (le nommage)
 */

$toto = 'fiorella';
$$toto = 'daughter'; // équivaut à écrire $fiorella = 'daughter';

// Exemple concret
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];

// Possibilité avec les variables dynamiques
$fields = ['email', 'message', 'subject', 'phone', 'zip', 'address', 'city', 'country'];

foreach ($fields as $field) {
    $$field = $_POST[$field];
    // $email = $_POST['email'];
    // ${'email'} = $_POST['email'];
    // ${$field} = $_POST[$field];
}

var_dump($email);
