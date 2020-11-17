<?php

/*
1. Ecrire une boucle qui affiche les nombres de 10 à 1
2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100
3. Ecrire le code permettant de trouver le PGCD de 2 nombres
4. Coder le jeu du FizzBuzz
Parcourir les nombres de 0 à 100
Quand le nombre est un multiple de 3, afficher Fizz.
Quand le nombre est un multiple de 5, afficher Buzz.
Quand le nombre est un multiple de 15, afficher FizzBuzz.
Sinon, afficher le nombre
*/

echo '<h2>Ecrire une boucle qui affiche les nombres de 10 à 1</h2>';

for ($i = 10; $i >= 1; $i--) {
    echo $i.' - ';
}

echo '<h2>Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100</h2>';

for ($i = 1; $i <= 100; $i++) {
    // On vérifie que le nombre est pair avec le modulo
    // Avec le modulo (%), on divise i par 2 ($i % 2). Le calcul nous retourne le reste de la division.
    // Si ce reste est 0, le nombre est divisible par 2.
    if ($i % 2 === 0) {
        echo $i.' - ';
    }
}

echo '<h2>Ecrire le code permettant de trouver le PGCD de 2 nombres</h2>';

$number1 = 96;
$number2 = 36;

while ($number2 !== 0) {
    if ($number1 > $number2) {
        $number1 = $number1 - $number2;
    } else {
        $number2 = $number2 - $number1;
    }
}

echo 'Le PGCD est '.$number1;

echo '<h2>Coder le jeu du FizzBuzz</h2>';

for ($i = 1; $i <= 100; $i++) {
    if ($i % 15 === 0) { // Quand $i est divisible par 15
        echo 'FizzBuzz - ';
    } else if ($i % 5 === 0) { // Quand $i est un multiple de 5
        echo 'Buzz - ';
    } else if ($i % 3 === 0) { // Quand $i est un multiple de 3 (ou divisible par 3)
        echo 'Fizz - ';
    } else { // Sinon on affiche le nombre
        echo $i.' - ';
    }
}
