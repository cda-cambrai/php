<?php

/*
Créer une fonction calculant le carré d'un nombre
Créer une fonction calculant l'aire d'un rectangle et une fonction pour celle d'un cercle
Créer une fonction calculant le prix TTC d'un prix HT. Nous aurons besoin de 2 paramètres, le prix HT et le taux.
Ajouter un 3ème paramètre à cette fonction permettant de l'utiliser dans les 2 sens (HT vers TTC ou TTC vers HT)
*/

echo '<h2>Créer une fonction calculant le carré d\'un nombre</h2>';

function square($number) {
    return $number * $number;
}

echo 'Le carré de 5 est '.square(5).'<br />';
echo 'Le carré de 10 est '.square(10);

echo '<h2>Créer une fonction calculant l\'aire d\'un rectangle et une fonction pour celle d\'un cercle</h2>';

function areaRectangle($width, $length) {
    return $width * $length;
}

echo 'L\'aire d\'un carré de 10m sur 5m est de ' . areaRectangle(10, 5) . 'm² <br />';

function areaCircle($radius) {
    // On arrondit le résultat à cause de PI
    return round(square($radius) * pi(), 2);
}

echo 'L\'aire d\'un cercle de rayon de 3m est de '.areaCircle(3).'m² <br />';

echo '<h2>Créer une fonction calculant le prix TTC d\'un prix HT. Nous aurons besoin de 2 paramètres, le prix HT et le taux.</h2>';

function convert($price, $rate = 20, $withTax = true) {
    // On veut un prix HT (10) en TTC (12)
    if ($withTax) {
        // Le return arrête la fonction
        return $price * (1 + $rate / 100);
    } else {
        // Ici, on a le calcul d'un prix TTC (12) vers un prix HT (10)
        return $price / (1 + $rate / 100);
    }
}

echo 'Le prix TTC de 10 est '.convert(10, 20, true).'<br />';

echo '<h2>Ajouter un 3ème paramètre à cette fonction permettant de l\'utiliser dans les 2 sens (HT vers TTC ou TTC vers HT)</h2>';

echo 'Le prix HT de 12 est '.convert(12, 20, false).'<br />';
