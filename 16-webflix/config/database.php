<?php

/*
 | -------------------------------
 | Connexion à la base de données
 | -------------------------------
 |
 | Permet d'établir la connexion entre PHP et MySQL
 |
*/

// On va pouvoir se connecter avec PDO
// On peut encapsuler le code dans un try catch
try {
    $db = new PDO('mysql:host=localhost;port=3306;dbname=webflix', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // On active les erreurs SQL
    ]);
} catch (Exception $exception) {
    echo '<img width="100" src="assets/img/travolta.gif" />';
    echo $exception->getMessage(); // Affiche le message de l'erreur
    exit(); // Arrête le script PHP
}
