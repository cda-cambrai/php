<?php

echo $a; // Affiche une NOTICE

echo 10 / 0; // Affiche un warning

echo 'Mon code <br />';

// Si on a une erreur de type "unexpected end of file",
// il manque forcément une accolade quelque part
$b = 10;
if ($b < 15) {
    echo 10;
}

echo 'Le code n\'apparait pas <br />';

// On peut créer un tableau en PHP
$tableau = [1, 2, 3];

echo $tableau; // On ne peut pas afficher un tableau directement
echo '<br /> Le var dump ------ <br />';
// On peut afficher le contenu d'une variable avec le var_dump
var_dump($tableau);
echo '<br /> Le print_r ------ <br />';
print_r($tableau);
