<?php

/*
 * Quelques fonctions utiles en PHP
 */

// Est-ce que la variable $prenom est définie ou existe ou alors vaut null ?
// $prenom = 'Matthieu';
echo 'Isset renvoie ';
var_dump(isset($prenom)); // Renvoie false si $prenom n'est pas définie
echo '<br />';

// Est-ce que le contenu d'une variable est vide ?
echo 'Empty renvoie ';
$prenom = '';
var_dump(empty($prenom));
echo '<br />';

// On peut compter le nombre d'éléments d'un tableau
$voitures = ['Fiat', 'Peugeot', 'Porsche'];
echo 'J\'ai '.count($voitures).' voitures';
echo '<br />';

// On peut aussi compter le nombre de caractères d'une chaine
$message = 'Je vous ai envoyé un message';
echo 'Le texte fait '.strlen($message).' caractères (Taille de la chaine en octets) <br />';
echo 'En vrai, le texte fait '.iconv_strlen($message).' caractères. <br />';

/*
 * Les dates en PHP.
 * Pour rappel, en informatique, on se base sur un timestamp pour gérer les dates
 * Le timestamp, c'est le nombre de secondes écoulées depuis le 1er janvier 1970.
 */
echo '<h2>Les dates</h2>';

// Pour récupérer le timestamp actuel (en secondes)
echo 'Timestamp actuel : ' . time();
echo '<br />';

// Pour récupérer la date lisible par un humain
echo date('r');
echo '<br />';

// On peut formater différement
// 18/11/2020
echo date('d/m/Y');
echo '<br />';
// 09h27m
echo date('H\hi\m');
// Avec la concaténation
// echo date('H').'h'.date('i').'m';
echo '<br />';

// On peut remonter dans le temps
echo date('r', 1258147148);
echo '<br />';

// On peut aussi aller dans le futur
echo date('r', 1954751236);
echo '<br />';

// strtotime est l'inverse de la fonction date
echo strtotime('now');
echo '<br />';

// Usage simple de strtotime
// On veut le timestamp du 18 novembre 1900
echo strtotime('18 november 1900');
echo '<br />';
// On peut récupérer le jour de cette date
echo date('r', strtotime('18 november 1900 15:58:32'));
echo '<br />';

// Usage relatif de strtotime
// Je veux savoir la date qu'il sera dans 3 ans
echo date('r', strtotime('+3 years'));
echo '<br />';

// Récupérer le mois suivant (si on est en novembre)
echo date('r', strtotime('31 december'));
echo '<br />';

// On peut passer un timestamp en paramètre au strtotime
echo date('r', strtotime('+1 month', 1605690384));
