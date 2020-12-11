<?php

/*
 | -------------------------------
 | Fichier de configuration
 | -------------------------------
 |
 | Ce fichier contient toutes les variables
 | globales pour le site.
 | Titre du site, information de connexions à la BDD
 |
*/

$pageActive = basename($_SERVER['PHP_SELF']);

// On démarre la session...
session_start();

// On va générer un token pour le CSRF
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid());
}

// var_dump($_SESSION['token']);
