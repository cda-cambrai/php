<?php

/*
 * Fonctions sur les chaines en PHP
 */

// Comment récupérer le domaine d'un email ?
$email = 'matthieu@boxydev.com';
$domain = strstr($email, '@'); // On récupère @boxydev.com
echo $domain . '<br />';
echo strstr($email, '@', true) . '<br />'; // On affiche matthieu

// Vérifier qu'une chaine contient bien quelque chose
echo strpos($email, '@') . '<br />'; // Renvoie la taille de la chaine avant le @
var_dump(strpos('matthieuboxydev.com', '@')); // Renvoie false
echo '<br />';

// On peut remplacer une chaine dans une chaine
echo str_replace('boxydev', 'gmail', $email) . '<br />'; // Affiche matthieu@gmail.com

// On peut extraire une chaine d'une chaine
$alphabet = 'abcdef';

// Afficher "cd"
echo substr($alphabet, 2, 2) . '<br />'; // On démarre à l'index 2 et on prend 2 lettres

// Afficher "bcd"
echo substr($alphabet, 1, 3) . '<br />';

// Afficher "def"
echo substr($alphabet, 3) . '<br />';

// Afficher "f"
echo substr($alphabet, -1) . '<br />'; // On démarre à l'index de fin

// Afficher "ef"
echo substr($alphabet, -2) . '<br />';

// Afficher "de"
echo substr($alphabet, -3, 2) . '<br />';

// On peut inverser une chaine
echo strrev('Hello world!') . '<br />'; // Affiche "!dlrow olleH"

// On peut transfomer une chaine en tableau
$skills = 'html, css, js, php, mysql, angular, symfony, java';
$arraySkills = explode(', ', $skills);
var_dump($arraySkills);
echo '<br />';
echo 'Je maitrise ' . count($arraySkills) . ' compétences <br />';
echo 'Je préfère le ' . $arraySkills[3] . '<br />';

// On peut transformer un tableau en chaine
$words = ['Je', 'dois', 'apprendre', 'le', 'php'];
echo implode(' ', $words) . '<br />';

// On doit transformer un texte en minuscule ou majuscule
$message = 'Hello World';
echo strtolower($message) . '<br />';
echo strtoupper($message) . '<br />';

// Fonctions importantes pour sanitizer une chaine
$text = '      Hello      ';
$text = trim($text) . '<br />';
// var_dump($text);
echo '<br />';

// Supprimer les balises HTML d'une chaine
$text = '<h1>Son texte</h1>';
echo $text . '<br />';
echo strip_tags($text) . '<br />';
