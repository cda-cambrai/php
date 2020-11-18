<?php

echo '<h2>Capitales</h2>';

$capitales = [
    'France' => 'Paris',
    'Espagne' => 'Madrid',
    'Italie' => 'Rome',
];

foreach ($capitales as $pays => $capitale) {
    echo "La capitale de $pays est $capitale <br />";
}

echo '<h2>Population</h2>';

$population = [
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
];

foreach ($population as $pays => $popu) {
    if ($popu >= 20000000) { // On affiche le pays seulement si il a 20 millions d'habitants ou plus
        echo "$pays a une population de $popu <br />";
    }
}

echo '<h2>Population Europe</h2>';

$total = 0; // Variable qu'on va incrémenter dans le foreach
// unset($population['Mexique']); // Solution 2: On peut supprimer l'index d'un tableau

foreach ($population as $pays => $popu) {
    if ($pays !== 'Mexique') { // On exclut le Mexique du calcul
        $total = $total + $popu;
    }
}

echo "Il y a $total personnes en Europe";
