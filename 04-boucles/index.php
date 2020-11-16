<?php

/**
 * La boucle for existe aussi en PHP
 */
echo '<h2>La boucle for</h2>';

for ($i = 0; $i <= 10; $i++) {
    echo $i.' - ';
}

/*
 * La boucle foreach permet de parcourir un tableau
 */
echo '<h2>La boucle foreach</h2>';
$students = ['Kevin', 'Matthieu', 'Najat'];

//var_dump($students);
// Avant le as, c'est le tableau à parcourir
// Après le as, c'est la valeur dans le tableau
// "Pour chaque $student dans notre tableau $students"
foreach ($students as $student) {
    echo $student . '<br />';
}

echo '<h2>La boucle foreach avec les index</h2>';
// Dans le foreach, on peut optionnellement récupérer l'index
foreach ($students as $position => $student) {
    echo $position . ' : ' . $student . '<br />';
}

// En JS, on fait students.length mais en PHP on doit utiliser
// la fonction count()
echo 'Le nombre de students est ' . count($students);

echo '<h2>Les tableaux associatifs</h2>';
// En PHP, on peut modifier l'index dans les tableaux, on appelle cela
// un tableau associatif. Par défaut, un tableau est dit numérique.
// Ici, l'index de Abricot n'est plus 0 mais 10.
// L'index de Banane n'est pas 1 mais B.
// Dans cet exemple, Cerise a l'index 11.
$fruits = [10 => 'Abricot', 'B' => 'Banane', 'Cerise'];
var_dump($fruits);
echo '<br />';

foreach ($fruits as $index => $fruit) {
    echo $index . ' : ' . $fruit . '<br />';
}

echo '<h2>La boucle while</h2>';

$i = 0;
while ($i < 10) {
    echo $i++.',';
}

echo '<h2>La boucle do...while</h2>';

// Le do...while est un while qui s'exécute au moins une seule fois.
$i = 0;
do {
    echo $i++;
} while ($i < 0);
