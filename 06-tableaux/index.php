<?php

/**
 * Les tableaux en PHP
 */

// Rappel, un tableau numérique
$contacts = ['Toto', 'Titi', 'Tata'];
// Optionnellement, on peut définir les index
$contacts = [0 => 'Toto', 1 => 'Titi', 2 => 'Tata'];

// Comment récupèrer Titi ?
echo $contacts[1]; // J'affiche Titi
echo '<br />';

// Comment faire pour parcourir un tableau numérique ?
// $contacts est le tableau à parcourir
// $contact représente chaque valeur du tableau
// On peut récupèrer l'index de chaque valeur avec " $index => " mais c'est optionnel
foreach ($contacts as $index => $contact) {
    echo $contact . ' a l\'index '.$index.' <br />';
}

// En PHP, on peut créer un tableau associatif
// Attention, une clé doit être unique sinon elle écrase la précédente
$contacts = [
    'nom1' => 'Toto',
    'nom2' => 'Titi',
    'nom3' => 'Tata'
];

var_dump($contacts); // On peut afficher le tableau
echo '<br />';

// Comment récupèrer Titi ?
echo $contacts['nom2']; // Affiche Titi
echo '<br />';

// Comment faire pour parcourir un tableau associatif ?
// C'est la même chose que de parcourir un tableau numérique
foreach ($contacts as $index => $contact) {
    echo $contact . ' a l\'index '.$index.' <br />';
}

// Comment stocker plusieurs contacts dans un tableau ?
// On pourrait utiliser un tableau multidimensionnel à 2 niveaux
$contacts = [
    ['nom' => 'Mota', 'prenom' => 'Matthieu'],
    ['nom' => 'Smaga', 'prenom' => 'Michael'],
    ['nom' => 'Boulanger', 'prenom' => 'Julien']
];

// Comment récupèrer Michael Smaga ?
echo $contacts[1]['prenom'] . ' ' . $contacts[1]['nom'];
echo '<br />';

// Comment parcourir un tableau multidimensionnel ?
foreach ($contacts as $contact) {
    // var_dump($contact);
    echo $contact['prenom'] . ' ' . $contact['nom'];
    echo '<br />';
}
