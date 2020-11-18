<?php

/*
1. Nous cherchons à afficher la date du jour au format "Wednesday 24 may 2018, il est 10h38 et 12 secondes". Cherchez sur Google la fonction PHP permettant de faire cela. Comment choisir le format de la date ?
2. Nous voulons récupérer le jour qu'il sera dans 10 jours exactement. Pensez que strtotime renvoie un timestamp.
3. Combien de jours reste-t-il avant Noël ?
*/

echo '<h2>Nous cherchons à afficher la date du jour</h2>';

// Solution 1
echo date('l d F Y, ') . 'il est ' . date('H\hi') . ' et ' . date('s') . ' secondes';
echo '<br />';

// Solution 2
$day = date('l d F Y');
$hour = date('H\hi');
$seconds = date('s');

echo "$day, il est $hour et $seconds secondes";
echo '<br />';

echo '<h2>Nous voulons récupérer le jour qu\'il sera dans 10 jours exactement</h2>';

echo 'Dans 10 jours, on sera '.date('l d', strtotime('+10 days'));
echo '<br />';

echo '<h2>Combien de jours reste-t-il avant Noël ?</h2>';

// On va récupérer le timestamp de maintenant et de Noël
$now = strtotime('now'); // ou time() ~ 1 600 000 000
$christmas = strtotime('25 december 2020'); // ~ 1 650 000 000
// Calcul du nombre de jours
// Une journée fait (60 * 60 * 24) = 86 400 secondes
$days = ($christmas - $now) / (60 * 60 * 24);
$days = round($days, 2); // On peut arrondir à 2 chiffres après la virgule

echo "Il reste $days jours avant Noël";
