<br />

<?php

// On peut faire des calculs en PHP
$nombre1 = 10;

// Afficher le résultat d'un calcul
echo 'Le résultat est '.($nombre1 + 5); // Affiche 15
?>

<br /> ----------------- <br />

<?php
// Opérateur de puissance
echo '10 puissance 2 = ';
echo 10 ** 2; // 10 puissance 2

echo '<br />';
// Opérateur d'incrémentation
echo $nombre1 += 3; // Affiche 13

echo '<br /> ---------- <br />';

// On peut écrire des conditions en PHP
$a = 3;
$condition = 0 === false; // Renvoie un booléen true ou false

if ($a === 0) {
    echo 'A vaut 0';
} else if ($a > 12 && $a <= 42) {
    echo 'On rentre dans le premier else if';
} else if ($condition) {
    echo 'On est dans le dernier else if';
} else {
    echo 'Bon aucun if n\'est ok';
}
